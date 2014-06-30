<?php

   include_once('class.MySQL.php');

 



   class dbhelper{

		private   $mysql_server_name; //数据库服务器名称
		private   $mysql_username; // 连接数据库用户名
		private   $mysql_password; // 连接数据库密码
		private   $mysql_database; // 数据库的名字
		private   $conn;


		 function __construct() {
			 $this->mysql_server_name="localhost"; //数据库服务器名称
				$this->mysql_username="root"; // 连接数据库用户名
				$this->mysql_password="8ecba89b81"; // 连接数据库密码
				$this->mysql_database="wxsdk"; // 数据库的名字
				$this->conn = new MySQL( $this->mysql_database,  $this->mysql_username,  $this->mysql_password, $this->mysql_server_name);
		}


		public function userLogin($WeiXinId,$WeiXinPWD){
				$selectUser="SELECT * FROM account  where wxid='".$WeiXinId."' and wxpwd='".$WeiXinPWD."'";

                $result=$this->conn->ExecuteSQL($selectUser);
				 
                if(count($result)>1){
					 return  true;
                } else{
					 return false;
                }
		}
		public function userReg($WeiXinId,$WeiXinPWD,$appid,$appsecret){
			$insertUser="insert into account   values ('".$WeiXinId."','".$WeiXinPWD."','".$appid."','".$appsecret."')"  ;
			$result=$this->conn->ExecuteSQL($insertUser);
			return $result;
		}
		// 创建菜单
		public  function createMenu($data){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$tmpInfo = curl_exec($ch);
					if (curl_errno($ch)) {
					return curl_error($ch);
				}
				curl_close($ch);
				return $tmpInfo;
		}
		//获取菜单
		public   function getMenu(){
				return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".ACCESS_TOKEN);
		}
		//删除菜单
		public  function deleteMenu(){
				return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".ACCESS_TOKEN);
		}



 }
?>