<?php
// Code for user login

public function login()
{
// Get the user ID and password from the login form
$user_id = $this->input->post('user_id');
$password = $this->input->post('password');

// Verify user credentials
if ($this->user_model->verify_user($user_id, $password)) {

// Get the current session ID
$session_id = session_id();

// Check if the user is already logged in from another browser
$logged_in_user = $this->user_model->get_user_session($user_id);

if ($logged_in_user) {
// Destroy the previous session and redirect to the login page
$this->session->sess_destroy();
redirect('login');
} else {
// Save the user ID and session ID in the database or file
$this->user_model->save_user_session($user_id, $session_id);

// Set the user session data and redirect to the dashboard page
$user_data = array(
'user_id' => $user_id,
'logged_in' => TRUE
);
$this->session->set_userdata($user_data);
redirect('dashboard');
}
} else {
// Invalid user credentials, show error message
$this->session->set_flashdata('error', 'Invalid username or password');
redirect('login');
}
}

// Code for user logout

public function logout

continue on it
()
{
// Get the current user ID
$user_id = $this->session->userdata('user_id');

// Remove the user session data from the database or file
$this->user_model->remove_user_session($user_id);

// Clear the user session data and destroy the session
$this->session->unset_userdata('user_id');
$this->session->unset_userdata('logged_in');
$this->session->sess_destroy();

// Redirect to the login page
redirect('login');
}

class User_model extends CI_Model {

   // Verify user credentials
   public function verify_user($user_id, $password) {
      $this->db->where('user_id', $user_id);
      $this->db->where('password', $password);
      $query = $this->db->get('users');
      return $query->num_rows() == 1;
   }

   // Get user session data
   public function get_user_session($user_id) {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('user_sessions');
      return $query->row();
   }

   // Save user session data
   public function save_user_session($user_id, $session_id) {
      $data = array(
         'user_id' => $user_id,
         'session_id' => $session_id
      );
      $this->db->insert('user_sessions', $data);
   }

   // Remove user session data
   public function remove_user_session($user_id) {
      $this->db->where('user_id', $user_id);
      $this->db->delete('user_sessions');
   }

}


The code above is an example of user login and logout functionality in a web application using the CodeIgniter PHP
framework.

In the login function, the user ID and password are obtained from the login form and verified against the database using
the user_model's verify_user function. If the credentials are valid, the current session ID is obtained and checked
against any existing sessions for the user in the database using the get_user_session function. If the user is already
logged in from another browser, their previous session is destroyed and they are redirected to the login page.
Otherwise, the user ID and session ID are saved in the database using the save_user_session function, and the user is
redirected to the dashboard page with their user ID and logged_in status stored in the session.

In the logout function, the current user ID is obtained from the session, and their session data is removed from the
database using the remove_user_session function. Then, the user session data is cleared and the session is destroyed
using unset_userdata and sess_destroy functions respectively. Finally, the user is redirected to the login page.