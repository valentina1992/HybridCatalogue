<?php

/*
** dichiaro tutti i parametri che mi servono
** compreso lo screenshots che è un array
*/
class googlePlayParser {
    private $url = '';
    private $data = NULL;
    private $id = NULL;
    private $name = '';
    private $oneLiner = '';
    private $category = '';
    private $createdAt = '';
    private $image = '';
    private $screenshots = array();
    private $iconUrl = '';
    private $description = '';
    private $latestRelease = '';
    private $rating = 0;
    private $reviewsCount = 0;
    private $size = 0;
    private $platformVersion = 0;
    private $version = 0;
    private $seller = '';
    private $iosUrl = '';
    private $androidUrl = '';
    private $windowsUrl = '';

    /* Filtra ID verificando che sia un formato ID valido
    ** strpos è restituisce la posizione numerica della prima occorrenza
    ** in questo caso nell'URL deve cercare i caratteri : &, =, ?
    ** Se non viene trovata alcuna occorrenza strpos restituirà FALSE
    ** nel nostro caso un Errore di URL non corretto
    */

    public static function extractID($url){
        $pos = 0;
        if (($pos = strpos($url, 'id=')) === FALSE) {
          if (strpos($url, '&') || strpos($url, '=') || strpos($url, '?'))
                throw new Exception("Url incorrect, as it contains no id");
            return $url;
        }
        /*
        ** explode ha il compito di suddividere una stringa
        ** sulla base di un dato separatore;

        ** substr restituisce una parte di una stringa
        ** che sia prima del carattere '&', o 'id' o '='
        */

        $url    = substr($url, $pos);
        $params = explode('&', $url);
        foreach ($params as $param) {
            if (strncmp('id', $param, 2) != 0)
                continue;
            $id = explode('=', $param);
            return $id[1];
        }
        throw new Exception("No ID found");
    }

    public function getOrigin(){
        return $this->url;
    }

    /*
    ** Questa funzione vede la versione della nostra applicazione
    ** e trim rimuove lo spazio presente
    */
    public function checkVersion($version){
        return trim($version) == $this->version;
    }


    /*
    ** Funzione che estrae l'id dal paramentro $id,
    ** con l'url di google play controlla se esiste l'applicazione
    ** oppure no
    **
    ** file_get_contents legge il contenuto di un file e lo restituisce sotto forma di stringa
    ** se non ha trovato nulla restituisce FALSE
    */
    function __construct($id) {
        $this->id   = googlePlayParser::extractID($id);
        $this->url  = 'https://play.google.com/store/apps/details?id=' . $this->id . '&hl=en';
        $this->data = @file_get_contents($this->url);

        if ($this->data === FALSE)
            throw new Exception("App not found");

        /*
        ** La pseudo-variabile $this è disponibile
        ** quando un metodo è invocato dall'interno del contesto di un oggetto
        ** andremo ad invocare questi metodi successivamente
        */
        $this->fetchName();
        $this->fetchImage();
        $this->fetchWebSite();
        $this->fetchOneLiner();
        $this->fetchCategory();
        $this->fecthCreatedAt();
        $this->fetchScreenshots();
        $this->fetchIconUrl();
        $this->fetchDescription();
        $this->fetchVersion();
        $this->fetchRating();
        $this->fetchReviewsCount();
        $this->fetchSize();
        $this->fetchPlatformVersion();
        $this->fetchSeller();
    }

    public function getID(){
        return $this->id;
    }

    /*
    ** englishToIsoDate mi restituirà la data in
    ** formato inglese, scrivendo tutti i mesi come un
    ** array e con la funzione explode ha il compito di
    ** suddividere una stringa sulla base di un dato separatore;
    */
    public static function englishToIsoDate($dateString){
        $lookup = array(
            'january' => 1,
            'february' => 2,
            'march' => 3,
            'april' => 4,
            'may' => 5,
            'june' => 6,
            'july' => 7,
            'august' => 8,
            'september' => 9,
            'october' => 10,
            'november' => 11,
            'december' => 12
        );
        $pieces = explode(' ', str_replace(',', ' ', $dateString));
        $date = $pieces[3] . '-' . str_pad($lookup[strtolower($pieces[0])], 2, '0', STR_PAD_LEFT) . '-' . str_pad($pieces[1], 2, '0', STR_PAD_LEFT);
        return $date;
    }

    /*
    ** italianToIsoDate mi restituirà la data
    ** in formato italiana
    */
    public static function italianToIsoDate($dateString)
    {
        $lookup = array(
            'gennaio' => 1,
            'febbraio' => 2,
            'marzo' => 3,
            'aprile' => 4,
            'maggio' => 5,
            'giugno' => 6,
            'luglio' => 7,
            'agosto' => 8,
            'settembre' => 9,
            'ottobre' => 10,
            'novembre' => 11,
            'dicembre' => 12
        );
        $pieces = explode(' ', $dateString);
        $date = $pieces[2] . '-' . str_pad($lookup[strtolower($pieces[1])], 2, '0', STR_PAD_LEFT) . '-' . str_pad($pieces[0], 2, '0', STR_PAD_LEFT);
        return $date;
    }
    /*FINE DATA FORMAT*/


    /*
    ** Questa funzione controlla se in un url
    ** esiste un http allora mi restituisce $_url scritto correttamente
    ** altrimenti aggiunge http + $_url
    */
    private static function purifyUrl($_url){
        if (strrpos($_url, 'http', -strlen($_url)) == true)
            return 'http:' . $_url;
        return $_url;
    }

    /*
    ** Inziano le funzioni
    ** get usato per ottenere dei dati
    ** set usato per impostare dei dati.
    */
    public function getSeller()
    {
        return $this->seller;
    }
    public function setSeller($seller)
    {
        return $this->seller = $seller;
    }

    public function getiosUrl()
    {
        return $this->iosUrl;
    }
    public function setiosUrl($iosUrl)
    {
        return $this->iosUrl = $iosUrl;
    }

    public function getandroidUrl()
    {
        return $this->url;
    }

    public function getwindowsUrl()
    {
        return $this->windowsUrl;
    }
    public function setwindowsUrl($windowsUrl)
    {
        return $this->windowsUrl = $windowsUrl;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function getIconUrl(){
        return $this->iconUrl;
    }

    public function setIconUrl($iconUrl){
        $this->iconUrl = $iconUrl;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

    public function setWebSite($website)
    {
        $this->website = $website;
    }

    public function getWebSite()
    {
        return $this->website;
    }

    public function setOneLiner($oneLiner)
    {
        $this->oneLiner = $oneLiner;
    }

    public function getOneLiner()
    {
        return $this->oneLiner;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setTechnicalNotes($technicalNotes)
    {
        $this->technicalNotes = $technicalNotes;
    }

    public function getTechnicalNotes()
    {
        return $this->technicalNotes;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setScreenshots($screenshots)
    {
        $this->screenshots = $screenshots;
    }

    public function getScreenshots()
    {
        return $this->screenshots;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setLatestRelease($latestRelease)
    {
        $this->latestRelease = $latestRelease;
    }

    public function getLatestRelease()
    {
        return $this->latestRelease;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setReviewsCount($reviewsCount)
    {
        $this->reviewsCount = $reviewsCount;
    }

    public function getReviewsCount()
    {
        return $this->reviewsCount;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setPlatformVersion($platformVersion)
    {
        $this->platformVersion = $platformVersion;
    }

    public function getPlatformVersion()
    {
        return $this->platformVersion;
    }

    /*
    ** Fine funzioni get e set
    */

    /*
    ** Inizio dell'invocazione del metodo scritto
    ** precedentemente con il codece HTML che prende i nostri
    ** dati formattato tramite REGEX101
    */
    protected function fetchName(){
        $result = array();
        preg_match_all('/<div class="id-app-title" tabindex="0">(.+?)<\/div>/', $this->data, $result);
        $this->name = $result[1][0];
    }

    protected function fetchImage()
    {
        $result = array();
        preg_match_all('/<img class="cover-image" src="(.+?)".*>/', $this->data, $result);
        $this->image = 'http:' . $result[1][0];
    }

    protected function fetchWebSite()
    {
        $result = array();
        preg_match_all('/<a class="dev-link" href="(.+?)".*>/', $this->data, $result);
        $this->website = $result[1][0];
    }

    protected function fetchOneLiner()
    {
        $result = array();
        preg_match_all('/<p>(.+?)<\/p>/', $this->data, $result);
        if(isset($result[1][0]))
          $this->oneLiner = $result[1][0];
    }

    protected function fetchCategory()
    {
        $result = array();
        preg_match_all('/<span itemprop="genre">(.+?)<\/span>/', $this->data, $result);
        $this->category = $result[1][0];
    }

    protected function fetchIconUrl()
    {
        $result = array();
        preg_match_all('/<img class="cover-image"+.?src="(.+?)".+?>/', $this->data, $result);
        $this->iconUrl = self::purifyUrl($result[1][0]);
    }

    protected function fecthCreatedAt()
    {
        $result = array();
        preg_match_all('/<div class="content" itemprop="datePublished">(.+?)<\/div>/', $this->data, $result);
        $this->createdAt = self::englishToIsoDate($result[1][0]);
    }

    protected function fetchScreenshots()
    {
        $result = array();
        preg_match_all('/<img.+?itemprop="screenshot".+?src="(.+?)".+?>/', $this->data, $result);
        $this->screenshots = array();
        foreach ($result[1] as $screenshot)
            $this->screenshots[] = 'http:' . self::purifyUrl($screenshot);
    }

    protected function fetchDescription()
    {
        $result = array();
        preg_match_all('/<p>(.+?)<\/p>/', $this->data, $result);
        if(isset($result[1][0]))
          $this->description = $result[1][0];
    }
    protected function fetchVersion()
    {
        $result = array();
        preg_match_all('/<div class="content" itemprop="softwareVersion">(.+?)<\/div>/', $this->data, $result);
        if (isset($result[1][0]))
            $this->version = trim($result[1][0]);
        else {
            $this->version = '';
        }
    }
    protected function fetchRating()
    {
        $result = array();
        preg_match_all('/<div class="score".+?>(.+?)<\/div>/', $this->data, $result);
        $this->rating = $result[1][0];
    }
    protected function fetchReviewsCount()
    {
        $result = array();
        preg_match_all('/<p>(.+?)<\/p>/', $this->data, $result);
        if(isset($result[1][0]))
          $this->reviewsCount = $result[1][0];
    }
    protected function fetchSize()
    {
        $result = array();
        preg_match_all('/itemprop="fileSize">(.+?)<\/div>/', $this->data, $result);

        if (isset($result[1][0]))
            $this->size = $result[1][0];
        else
            $this->size = 0;
    }
    protected function fetchPlatformVersion()
    {
        $result = array();
        preg_match_all('/<div class="content" itemprop="operatingSystems">(.+?)<\/div>/', $this->data, $result);
        $this->platformVersion = trim($result[1][0]);
    }

    protected function fetchSeller()
    {
        $result = array();
        preg_match_all('/<span itemprop="name">(.+?)<\/span>/', $this->data, $result);
        $this->seller = $result[1][0];
    }
}
