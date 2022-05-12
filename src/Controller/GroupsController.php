<?php

declare(strict_types=1);

namespace App\Controller;

class GroupsController extends AppController
{


    public function index()
    {
        // $this->viewBuilder()->setLayout('main');
        $groups = $this->paginate($this->Groups);
        $this->set(compact('groups'));
    }

    public function add()
    {
        $group = $this->Groups->newEmptyEntity();
        if ($this->request->is('post')) {
            // $group = $this->Groups->patchEntity($group, $this->request->getData());
            $group_name = $this->request->getData('group_name');
            $this->getTablelocator()->get('Groups')->add($group_name);
            if (!$this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));
                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function delete()
    {
        if ($this->request->is('post')) {
            $group_id = $this->request->getData('group_id');
            $groups = $this->getTableLocator()->get('Groups');
            $query = $groups->query();
            $query->delete()
                ->where(['group_id' => $group_id])
                ->execute();
        }
        return $this->redirect(['action' => 'index']);
    }

    public function edit()
    {
        if ($this->request->is('post')) {
            $group_id = $this->request->getData('group_id');
            $group_name = $this->request->getData('group_name');
            $groups = $this->getTableLocator()->get('Groups');
            $groups = $groups->query();
            $groups->update()
                ->set(['group_name' => $group_name])
                ->where(['group_id' => $group_id])
                ->execute();
        }
        return $this->redirect('/view/'.$group_id);
    }
}
