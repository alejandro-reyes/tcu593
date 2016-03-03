<?php
class UsersController extends AppController {
 
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }
     
 
 
    public function login() {
         
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
				if(AuthComponent::user('status') == 0){
					$this->redirect($this->Auth->logout());
				}else{
					$this->redirect($this->Auth->redirectUrl());	
				}
            } else {
                $this->Session->setFlash(__('Nombre de usuario o contraseña inválid@'));
            }
        } 
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }
 
 
    public function add() {
        if ($this->request->is('post')) {
                 
            $this->User->create();
			if($this->request->data['User']['role'] == NULL){
				$this->request->data['User']['role'] = 'invitado';
			}
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido creado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se ha podido crear el usuario, por favor intente nuevamente.'));
            }   
        }
    }
 
    public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Indique un id de usuario válido');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash('Id de usuario inválido');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Se ha actualizado el usuario'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('No se han podido actualizar los datos del usuario.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Indique un id de usuario válido');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Id de usuario inválido');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('Usuario borrado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('No se ha podido borrar el usuario'));
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Indique un id de usuario válido');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Id de usuario inválido');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('Se ha re-activado el usuario'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('No se ha podido re-activar el usuario.'));
        $this->redirect(array('action' => 'index'));
    }
 
}