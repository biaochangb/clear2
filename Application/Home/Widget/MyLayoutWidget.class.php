<?php
namespace Home\Widget;
use Think\Controller;
class MyLayoutWidget extends Controller {
	public function homeHeader(){
		$this->display("MyLayout:homeHeader");
	}

	public function homeFooter(){
		$this->display("MyLayout:homeFooter");
	}

	public function navbar(){
		$this->display("MyLayout:navbar");
	}

	public function googleMap(){
		$this->display("MyLayout:googleMap");
	}
}
?>
