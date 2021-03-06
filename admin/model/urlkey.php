<?php
/*
*	@urlkey.php
*	Copyright (c)2013 Mallmold Ecommerce(HK) Limited. 
*	http://www.mallmold.com/
*	
*	This program is free software; you can redistribute it and/or
*	modify it under the terms of the GNU General Public License
*	as published by the Free Software Foundation; either version 2
*	of the License, or (at your option) any later version.
*	More details please see: http://www.gnu.org/licenses/gpl.html
*	
*	If you want to get an unlimited version of the program or want to obtain
*	additional services, please send an email to <service@mallmold.com>.
*/

class urlkey extends model
{
	public function set_goods($id, $urlkey)
	{
		return $this->save('goods', $id, $urlkey);
	}
	
	public function del_goods($id)
	{
		return $this->del('goods', $id);
	}
	
	public function set_goodscate($id, $urlkey)
	{
		return $this->save('catalog', $id, $urlkey);
	}
	
	public function del_goodscate($id)
	{
		return $this->del('catalog', $id);
	}
	
	public function set_article($article_id, $urlkey)
	{
		return $this->save('article', $article_id, $urlkey);
	}
	
	public function del_article($id)
	{
		return $this->del('article', $id);
	}
	
	public function set_articlecate($cate_id, $urlkey)
	{
		return $this->save('list', $cate_id, $urlkey);
	}
	
	public function del_articlecate($id)
	{
		return $this->del('list', $id);
	}
	
	public function set_page($id, $urlkey)
	{
		return $this->save('page', $id, $urlkey);
	}
	
	public function del_page($id)
	{
		return $this->del('page', $id);
	}
	
	private function save($model, $item_id, $urlkey)
	{
		if($urlkey == ''){
			$urlkey = $item_id;
		}
		
		$data = array(
			'model' => $model,
			'item_id' => $item_id,
			'urlkey' => $urlkey,
		);
		$id = $this->db->table('urlkey')->where("model='$model' and item_id=$item_id")->getval('id');
		if($id){
			$this->db->table('urlkey')->where("id=$id")->update($data);
		}else{
			$id = $this->db->table('urlkey')->insert($data);
		}
		return $id;
	}
	
	private function del($model, $item_id)
	{
		$this->db->table('urlkey')->where("model='$model' and item_id=$item_id")->delete();
	}
}
?>