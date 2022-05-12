<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    // public function index()
    // {
    //     $this->loadComponent('Paginator');
    //     $articles = $this->Paginator->paginate($this->Articles->find());
    //     $this->set(compact('articles'));
    // }

    public function show()
    {
        $art = $this->Articles->find()->all();
        $this->viewBuilder()->setLayout('main');
        $this->set(compact('art'));
    }

    public function view($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        // $this->set(compact('article'));

        $this->set('article', $article);
        return $this->render('/Articles/test');
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->user_id = 1;
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'show']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }

    public function edit($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'show']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('article', $article);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'show']);
        }
    }

    public function someMethod()
    {
        $articles = $this->getTableLocator()->get('Articles');
        // more code.
    }

}
