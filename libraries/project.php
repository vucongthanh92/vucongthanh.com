<?php
#####################################
#									#
# class connect database  			#
# code by cubiminhnhat@yahoo.com 	#
# date: 06/2010						#
#									#
#####################################



class project extends connect_db{
	protected $select;
	protected $where;
	protected $join;

	public function __construct()
	{
		$this->connect();
	}
	
	public function __destruct()
	{
		$this->disconnect();
	}
	
	public function num_rows()
	{
		if(isset($this->result))
		{
			return mysql_num_rows($this->result);
		}
		else
		{
			return 0;
		}		
	}
	
	public function fetchone()
	{
		if(isset($this->result))
		{
			return mysql_fetch_assoc($this->result);
		}
	}
	
	public function fetchall()
	{
		if(isset($this->result))
		{
			$data = '';
			while($rows = mysql_fetch_assoc($this->result))
			{
				$data[] = $rows;
			}
			return $data;
		}
	}
	
	public function insert($table,$data)
	{
		$key=implode(",",array_keys($data));
		$arr1=array_values($data);
		foreach($arr1 as $arr2)
		{
			$arr3[]="\"$arr2\"";
		}
		$values=implode(",",$arr3);
		$sql="insert into $table ($key) values ($values)";
		$this->query($sql);
	}
	
	public function insertid(){
		if($this->result){
			return mysql_insert_id();
		}
	}
	
	public function update($table,$data)
	{
		if(isset($this->where)){
			$where = "where $this->where";
		}else{
			$where = "";
		}
		
		if(is_array($data)){
			foreach($data as $key=>$value)
			{
				$arr[]="$key = '".$value."'";
			}
			$str=implode(",",$arr);
		}else{
			$str = $data;
		}
		 $sql="update $table set $str $where";
		$this->query($sql);
	}
	
	public function delete($table,$where)
	{
		$sql = "delete from $table where $where";
		$this->query($sql);
	}
	
	public function select($data)
	{
		$this->select=$data;
	}
	
	public function where($data)
	{
		if(is_array($data))
		{
			foreach($data as $key=>$value)
			{
				$arr[]="$key '$value'";
			}
			$this->where=implode(" and ",$arr);
		}
		else
		{
			$this->where=$data;
		}
	}
	
	public function getdata($table,$order = "",$limit = "")
	{
		if(isset($this->select)){
			$select = $this->select;
		}
		else{
			$select = "*";
		}
		
		if(isset($this->where)){
			$where = "where $this->where";
		}
		else{
			$where = "";
		}
		
		if($order != ""){
			$order="order by $order";
		}
		
		if($limit != ""){
			$limit="limit $limit";
		}
		
		$sql="select $select from $table $where $order $limit";
		$this->query($sql);
	}
	
	public function getLeftJoinData($table1,$table2, $on = '', $order="",$limit="")
	{
		if($this->select){
			$select = $this->select;
		}else{
			$select = "*";
		}
		
		if(isset($this->where)){
			$where = "where $this->where";
		}
		else{
			$where = "";
		}
		
		if($order != ""){
			$order="order by $order";
		}
		
		if($limit != ""){
			$limit="limit $limit";
		}
		
		$sql = "select $select from $table1 LEFT JOIN $table2 ON $on $where $order $limit";
		$this->query($sql);
	}
	
	public function affect_rows()
	{
		if(isset($this->result))
		{
			return mysql_affected_rows();
		}
	}
	
	public function escape_string($value)
	{
		return mysql_real_escape_string($value);
	}
	
	public function free_result()
	{
		if(isset($this->result))
		{
			mysql_free_result($this->result);
		}
	}
	
	public function sqlQuote($value)
	{
	 //Kiem tra xem version PHP ban su dung c� hieu h�m mysql_real_escape_string() hay ko
			
		if ($this->real_escape_string_exists) {
		//truong hop su dung php 4.3 tro len
		//PHP hieu h�m mysql_real_escape_string()
				
			if( $this->magic_quotes_active ) { 
			//Trong trong truong hop php da ho tro h�m get_magic_quotes_gpc()
			//Ta su dung h�m stripslashes de bo qua c�c dau slashes
				$value = stripslashes( $value ); 
			}
			$value = mysql_real_escape_string( $value );
	   } 
	   else {
		   //Truong hop d�ng cho c�c version PHP duoi 4.3.0
		   //PHP kh�ng hieu h�m mysql_real_escape_string()
				
		   if( !$this->magic_quotes_active ){ 
		   //Trong truong hop php ko ho tro h�m get_magic_quotes_gpc()
		   //Ta su dung h�m addslashes de th�m c�c dau slashes v�o gi� tri
			$value = addslashes( $value ); 
		   }
	   }
	   return $value;
	} 
}

?>