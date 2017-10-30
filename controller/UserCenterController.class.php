<?php
	class UserCenterController{
		public function reg(){
			include "./view/user/reg.html";
		}
		public function doReg(){
			$upload =L("upload");
			$image = $upload->run('image');
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$userModel = new UserModel();
			$userModel-> addUser($name,$email,$password,$image);
			header('Refresh:3,Url=index.php?c=UserCenter&a=login');
		}
		public function login(){
			include "./view/user/login.html";
		}
		public function doLogin(){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$verifyCode = $_POST['verifyCode'];
			$userModel = new UserModel();
			$userInfo = $userModel->getUserInfoByEmail($email);
			$_SESSION['me'] = $userInfo;
			if($userInfo){
				if($password == $userInfo['password']){
					if($verifyCode ==$_SESSION['verifyCode']){
						header('Refresh:3,Url=index.php?c=Home&a=lists'); 
					}else{
						echo "验证码错误";
						header('Refresh:3,Url=index.php?c=UserCenter&a=login');
					}
				}else{
					echo "密码错误";
					header('Refresh:3,Url=index.php?c=UserCenter&a=login');
				}
			}else{
				echo "该用户不存在";
				header('Refresh:3,Url=index.php?c=UserCenter&a=reg');
			}	
		}
		public function logout(){
			unset($_SESSION['me']);
		    echo "<script>history.go(-1);</script>";  
		}
		public function verifyCode(){
			header("Content-Type:image/png");
			$image = imagecreate(60, 30);
			$backcolor = imagecolorallocate($image,255, 255, 0);
			$font = imagecolorallocate($image, 0, 240, 100);
			$str = getRandom(4);
			$_SESSION['verifyCode'] = $str;
			imagestring($image, 5, 7, 5, $str, $font);
			imagepng($image);
			imagedestroy($image);
		}

	}