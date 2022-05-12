<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Group;

class ContentsController extends AppController
{
    public function view($group_id)
    {
        // $groups = $this->getTablelocator()->get('Groups')->index();    
        $contents = $this->getTablelocator()->get('Contents')->view($group_id);
        // $groups = $this->Groups->find()->all();
        $groups = $this->getTableLocator()->get('groups')->find();
        $groups_now = $this->getTableLocator()->get('groups')->find()
            ->where(['group_id' => $group_id]);
        // $contents = $this->Contents->find()
        //     ->where(['content_group' => $group_id]);

        $this->set(compact('groups', 'contents', 'groups_now'));
        return $this->render('/Content/view');
    }
    
    public function add()
    {
        $contents = $this->Contents->newEmptyEntity();
        if ($this->request->is('post')) {
            $group_id = $this->request->getData('group_id');
            $content_body = $this->request->getData('content_body');
            $this->getTablelocator()->get('Contents')->add($content_body, $group_id);
            
        }
        return $this->redirect('/view/'.$group_id);
    }

    public function delete()
    {
        if ($this->request->is('post')) {
            $content_id = $this->request->getData('content_id');
            $group_id = $this->request->getData('group_id');
            $contents = $this->getTableLocator()->get('Contents');
            $query = $contents->query();
            $query->delete()
                ->where(['content_id' => $content_id])
                ->execute();
        }
        return $this->redirect('/view/'.$group_id);
    }



}
