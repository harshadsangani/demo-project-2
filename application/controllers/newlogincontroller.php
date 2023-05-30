<?php
 class newlogincontroller extends CI_controller{
    public function login(){
    // perform login validation
    if ($login_successful) {
        // set session variable indicating user is logged in
        $this->session->set_userdata('logged_in', true);
        // redirect to dashboard or other appropriate page
        redirect('dashboard');
    } else {
        // display error message and login form
        $this->load->view('login');
    }
}

}   ?>

$config['csrf_expire'] = 60;

<!-- Button trigger modal -->
<div id="session-expired-message" style="display:none;">
    <p>Your session has expired. Please <a href="<?php echo base_url('login'); ?>">log in</a> again.</p>
</div>

function checkSession() {
$.ajax({
url: '<?php echo base_url('Home_controller/check_session_status'); ?>',
success: function(data) {
if (data == "expired") {
// show the pop-up message
$('#session-expired-popup').show();
window.location.href = '<?php echo base_url('Login_Controller'); ?>';
} else {
// session is still active, check again after 5 seconds
setTimeout(checkSession, 5000);
}
}
});
}


public function check_session_status() {
if (!$this->session->userdata('Admin')) {
echo 'expired';
} else {
echo 'active';
}
}