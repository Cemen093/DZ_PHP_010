<?php
//Реализовать с выводом на страницу 4 типа заметки
//- Простая (Заголовок + текст)
//- С фото  (Заголовок + текст + фото)
//- С датой  (Заголовок + текст + фото + дата)
//- Только с датой (Заголовок + текст + дата)

class Note{
    private $heading;
    private $text;

    /**
     * @param $heading
     * @param $text
     */
    public function __construct($heading, $text)
    {
        $this->heading = $heading;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function toHTML(){
        return (
            '<div style="background-color: blue; margin: 10px">'.
                '<p style="font-weight: bold">'.$this->getHeading().'</p>'.
                '<p>'.$this->getText().'</p>'.
            '</div>'
        );
    }
}

class Note_2 extends Note{
    private $url;

    /**
     * @param $heading
     * @param $text
     * @param $url
     */
    public function __construct($heading, $text, $url)
    {
        parent::__construct($heading, $text);
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function toHTML(){
        return (
            '<div style="background-color: blue; margin: 10px">'.
            '<p style="font-weight: bold">'.$this->getHeading().'</p>'.
            '<p>'.$this->getText().'</p>'.
            '<img style="height: 100px" src="'.$this->getUrl().'"/>'.
            '</div>'
        );
    }
}

class Note_3 extends Note_2{
    private $datetime;

    /**
     * @param $heading
     * @param $text
     * @param $url
     * @param $datetime
     */
    public function __construct($heading, $text, $url)
    {
        parent::__construct($heading, $text, $url);
        $this->datetime = time();
    }

    /**
     * @return datetime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @return string
     */
    public function toHTML(){
        return (
            '<div style="background-color: blue; margin: 10px">'.
            '<p style="font-weight: bold">'.$this->getHeading().'</p>'.
            '<p>'.$this->getText().'</p>'.
            '<img style="height: 100px" src="'.$this->getUrl().'"/>'.
            '<p style="color: #666">'.date('l jS \of F Y h:i:s A', $this->datetime).'</p>'.
            '</div>'
        );
    }
}

class Note_2_2 extends Note{
    private $datetime;

    /**
     * @param $heading
     * @param $text
     * @param $datetime
     */
    public function __construct($heading, $text)
    {
        parent::__construct($heading, $text);
        $this->datetime = time();
    }

    /**
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @return string
     */
    public function toHTML(){
        return (
            '<div style="background-color: blue; margin: 10px">'.
            '<p style="font-weight: bold">'.$this->getHeading().'</p>'.
            '<p>'.$this->getText().'</p>'.
            '<p style="color: #666">'.date('l jS \of F Y h:i:s A', $this->datetime).'</p>'.
            '</div>'
        );
    }
}

$note = new Note("Заметка первая", "Заметка типа один");
$note_2 = new Note_2("Заметка вторая", "Заметка типа два", "photo.jpg");
$note_3 = new Note_3("Заметка третья", "Заметка типа три", "photo.jpg");
$note_2_2 = new Note_2_2("Заметка четвертая", "Заметка четыре");

echo $note->toHTML();
echo $note_2->toHTML();
echo $note_3->toHTML();
echo $note_2_2->toHTML();