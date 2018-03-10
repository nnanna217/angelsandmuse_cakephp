<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CouponsUsed Controller
 *
 * @property \App\Model\Table\CouponsUsedTable $CouponsUsed
 *
 * @method \App\Model\Entity\CouponsUsed[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CouponsUsedController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['used', 'markAsUsed']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'Coupons']
        ];
        $couponsUsed = $this->paginate($this->CouponsUsed);

        $this->set(compact('couponsUsed'));
    }

    public function markAsUsed($email, $coupon_id) {

        $message = 'Unsucessful.';
        $status = 0;
        $couponsUsed = $this->CouponsUsed->newEntity();
        $couponsUsed->email = $email;
        $couponsUsed->coupon_id = $coupon_id;
        
            if ($this->request->is('post', 'put', 'patch','get')) {
                $couponsUsed = $this->CouponsUsed->patchEntity($couponsUsed, $this->request->getData());
                $this->CouponsUsed->save($couponsUsed);
                $message = 'Successful';
                $status = 1;
        }
        $this->set(array(
            'message' => $message, 'status' => $status, '_serialize' => array('message', 'status')
        ));
    }

    public function used($email, $coupon_id) {

        $this->loadModel('CouponsUsed');
        $coupon = $this->CouponsUsed->find('all', array('conditions' =>
                    array('CouponsUsed.email' => $email, 'CouponsUsed.coupon_id' => $coupon_id)))->toArray();

        $this->set(array(
            'message' => 'success',
            'data' => $coupon,
            '_serialize' => array('message', 'data')
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Coupons Used id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $couponsUsed = $this->CouponsUsed->get($id, [
            'contain' => ['Users', 'Coupons']
        ]);

        $this->set('couponsUsed', $couponsUsed);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $couponsUsed = $this->CouponsUsed->newEntity();
        if ($this->request->is('post')) {
            $couponsUsed = $this->CouponsUsed->patchEntity($couponsUsed, $this->request->getData());
            if ($this->CouponsUsed->save($couponsUsed)) {
                $this->Flash->success(__('The coupons used has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupons used could not be saved. Please, try again.'));
        }
        $users = $this->CouponsUsed->Users->find('list', ['limit' => 200]);
        $coupons = $this->CouponsUsed->Coupons->find('list', ['limit' => 200]);
        $this->set(compact('couponsUsed', 'users', 'coupons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupons Used id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $couponsUsed = $this->CouponsUsed->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couponsUsed = $this->CouponsUsed->patchEntity($couponsUsed, $this->request->getData());
            if ($this->CouponsUsed->save($couponsUsed)) {
                $this->Flash->success(__('The coupons used has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupons used could not be saved. Please, try again.'));
        }
        $users = $this->CouponsUsed->Users->find('list', ['limit' => 200]);
        $coupons = $this->CouponsUsed->Coupons->find('list', ['limit' => 200]);
        $this->set(compact('couponsUsed', 'users', 'coupons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupons Used id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $couponsUsed = $this->CouponsUsed->get($id);
        if ($this->CouponsUsed->delete($couponsUsed)) {
            $this->Flash->success(__('The coupons used has been deleted.'));
        } else {
            $this->Flash->error(__('The coupons used could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
