<h2>-::Create Store::-</h2>
<div id="msg_div"></div>
<form class="form-inline" id="generate_otp_frm" action="<?php echo BASE_URL.$this->current_controller.'/generate_otp'?>">
  <div class="form-group">
    <label for="mobile">Mobile No.:</label>
    <input type="text" class="form-control validate[required]" name="mobile" id="mobile">
  </div>
  <button type="button" class="btn btn-default" id="generate_otp">Proceed</button>
</form>

<form class="form-inline hide" id="verify_otp_frm" action="<?php echo BASE_URL.$this->current_controller.'/verify_otp'?>">
  <div class="form-group">
    <label for="mobile">Mobile No.:</label>
    <input type="text" class="form-control validate[required]" readonly name="mobile" id="mobile_verify">
  </div>
  <div class="form-group">
    <label for="otp">OTP:</label>
    <input type="text" class="form-control validate[required]" name="otp" id="otp">
  </div>
  <button type="button" class="btn btn-default" id="verify_otp">Submit</button>
</form>

<form class="form-inline hide" id="register_store_frm" action="<?php echo BASE_URL.$this->current_controller.'/register_store'?>">
  <div class="form-group">
    <label for="store_name">Store Name:</label>
    <input type="text" class="form-control validate[required]" name="store_name" id="store_name">
  </div>
  <input type="hidden" name="uid" id="uid" value="">
  <button type="button" class="btn btn-default" id="register_store">Submit</button>
</form>

<form class="form-inline hide" id="add_store_content_frm" action="<?php echo BASE_URL.$this->current_controller.'/add_store_content'?>">
  <div class="form-group">
    <label for="content">Add Store Content:</label>
    <input type="text" class="form-control validate[required]" name="content" id="content">
  </div>
  <input type="hidden" name="uid_stote" id="uid_stote" value="">
  <button type="button" class="btn btn-default" id="add_store_content">Submit</button>
</form>


