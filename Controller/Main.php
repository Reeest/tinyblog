<?php


class Controller_Main extends Controller
{
    /**
     * Дефолтный урл картинки
     *
     * @var string
     */
    protected $defaultImage = 'http://www.idahoislove.com/wp-content/themes/fortunato-pro/images/no-image-box.png';

    /**
     * Обертка для индекса
     */
    public function index()
    {
        $this->view->generate('index', $this->getAll());
    }

    /**
     * Добавляем
     *
     * @param $data
     */
    public function addNew($data)
    {
        $query = new Query();
        $date = new DateTime();
        $data['lastUpdateDate'] = $date->format('Y-m-d');
        !empty($data['imageUrl']) ?: $data['imageUrl'] = $this->defaultImage;
        $query->insert('post')
            ->set($data)
            ->execute();
        $this->view->generate('getAll', $this->getAll());
    }

    /**
     * Получаем один элемент
     *
     * @param $data
     */
    public function getOnce($data)
    {
        $query = new Query();
        $item = $query->select()
            ->from('post')
            ->where('id', $data['id'])
            ->execute()
            ->asRaw();
        $this->view->generate('getOnce', $item);
    }

    /**
     * Получаем все
     *
     * @return mixed
     */
    protected function getAll()
    {
        $query = new Query();
        return $query->select()
            ->from('post')
            ->orderBy('id DESC')
            ->execute()
            ->asTable();
    }

    /**
     * Апдейтим
     *
     * @param $data
     */
    public function update($data)
    {
        $query = new Query();
        $date = new DateTime();
        $data['lastUpdateDate'] = $date->format('Y-m-d');
        $query->update('post')
            ->set($data['params'])
            ->where('id', $data['id'])
            ->execute();
        $this->view->generate('getAll', $this->getAll());
    }

    /**
     * Удаляем
     *
     * @param $data
     */
    public function delete($data)
    {
        $query = new Query();
        $query->delete('post')
            ->where('id', $data['id'])
            ->execute();
        $this->view->generate('getAll', $this->getAll());
    }
}



