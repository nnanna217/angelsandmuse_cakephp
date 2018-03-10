<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Coupons Controller
 *
 * @property \App\Model\Table\CouponsTable $Coupons
 *
 * @method \App\Model\Entity\Coupon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CouponsController extends AppController
{
    
    
    public $components = array('RequestHandler');
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['coupon','coupons','getDiscount']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $coupons = $this->paginate($this->Coupons);

        $this->set(compact('coupons'));
    }

    /**
     * GetEvents API method
     *
     * @return \Cake\Http\Response|void
     */
    public function coupon($id)
    {
        $coupon = $this->Coupons->get($id);
        $this->set([
            'coupon' => $coupon,
            '_serialize' => ['coupon']
        ]);
        
    }
    
    public function getDiscount($slug, $email)
    {
        $this->loadModel('CouponsUsed');
        $coupon = $this->Coupons->find()->where(['slug'=>$slug])->toArray();
        $couponUsed = $this->CouponsUsed->find('all', array('conditions' =>
                    array('CouponsUsed.email' => $email, 'CouponsUsed.coupon_id' => $coupon[0]->id)))->toArray();
        $isUsed = $couponUsed ? true : false;
        
        $this->set([
            'coupon' => $coupon,
            'isUsed' => $isUsed,
            '_serialize' => ['coupon','isUsed']
        ]);
        
    }
    
    public function coupons()
    {
        $coupons = $this->Coupons->find('all');
        $this->set([
            'coupons' => $coupons,
            '_serialize' => ['coupons']
        ]);
    }
    
    
    
    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['CouponsUsed']
        ]);

        $this->set('coupon', $coupon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coupon = $this->Coupons->newEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        if ($this->Coupons->delete($coupon)) {
            $this->Flash->success(__('The coupon has been deleted.'));
        } else {
            $this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
