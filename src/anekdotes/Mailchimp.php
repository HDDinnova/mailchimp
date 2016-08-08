<?php

namespace Anekdotes\Mailchimp;

class Mailchimp
{
  private $key = '';
  private $param = array();

  public function __construct($key) {
    $this->key = $key;
  }

  /**
    * Obtenir les infos de toutes les listes
    * http://developer.mailchimp.com/documentation/mailchimp/reference/lists/#read-get_lists
    *
    * @param   array  params
    * @return  object
    */
  public function getLists($param = array()){
    $param = (array) $param;
    $url = "https://us9.api.mailchimp.com/3.0/lists";
    $this->buildParam($param);
    return $this->action("get", $url);
  }

  /**
    * Obtenir les infos d'une liste
    * http://developer.mailchimp.com/documentation/mailchimp/reference/lists/#read-get_lists_list_id
    *
    * @param   integer  list_id of the list
    * @param   array  params
    * @return  object
    */
  public function getList($list_id, $param = array()){
    $param = (array) $param;
    $url = "https://us9.api.mailchimp.com/3.0/lists/{$list_id}";
    $this->buildParam($param);
    return $this->action("get", $url);
  }

  /**
    * Ajouter un nouveau member a une liste
    * http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/#create-post_lists_list_id_members
    *
    * @param   integer  list_id of the list
    * @param   array  params
    * @return  object
    */
  public function postListMember($list_id, $param = array()){
    $param = (array) $param;
    $url = "https://us9.api.mailchimp.com/3.0/lists/{$list_id}/members";
    $this->buildParam($param);
    return $this->action("post", $url);
  }

  /**
    * Faire la requête à l'api de mailchimp
    *
    * @param   string  method http
    * @param   string  url de lapi
    * @return  object
    */
  private function action($method = "get", $url){
    $auth = base64_encode('user:' . $this->key);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    if ($method == "post")
      curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Basic ' . $auth
    ));
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->param));
    $response = curl_exec($curl);

    return json_decode($response);
  }

  /**
    * Construire les paramètres à envoyer à mailchimp
    *
    * @param   array  params
    * @return  void
    */
  private function buildParam($param){
    $param['apikey'] = $this->key;
    $this->param = $param;
  }

}
