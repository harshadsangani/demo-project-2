<?php
// In your login controller method
public function login() {
    // Check if user credentials are valid
    if ($this->auth->login($username, $password)) {
        // Create a new session for the user
        $session_data = array(
            'user_id' => $user_id,
            'username' => $username,
            'logged_in' => true
        );
        $this->session->set_userdata($session_data);

        // Set a cookie with the session ID
        $cookie_data = array(
            'name' => 'session_id',
            'value' => session_id(),
            'expire' => time() + (60 * 60 * 24 * 30), // 30 days
            'secure' => true
        );
        $this->input->set_cookie($cookie_data);

        // Check for existing sessions and logout from them
        $this->auth->logout_other_sessions($user_id);

        // Redirect the user to the dashboard
        redirect('dashboard');
    } else {
        // Invalid credentials, show error message
        $this->session->set_flashdata('error', 'Invalid username or password');
        redirect('login');
    }
}

// In your authentication library
public function logout_other_sessions($user_id) {
    // Get the session ID from the cookie
    $session_id = $this->input->cookie('session_id');

    // Check if there are any existing sessions for the user
    $this->db->where('user_id', $user_id);
    $this->db->where('session_id !=', $session_id);
    $query = $this->db->get('sessions');

    if ($query->num_rows() > 0) {
        // Logout from all other sessions
        foreach ($query->result
continue on it



second    
// In your login controller method
public function login() {
    // Check if user credentials are valid
    if ($this->auth->login($username, $password)) {
        // Create a new session for the user
        $session_data = array(
            'user_id' => $user_id,
            'username' => $username,
            'logged_in' => true
        );
        $this->session->set_userdata($session_data);

        // Set a cookie with the session ID
        $cookie_data = array(
            'name' => 'session_id',
            'value' => session_id(),
            'expire' => time() + (60 * 60 * 24 * 30), // 30 days
            'secure' => true
        );
        $this->input->set_cookie($cookie_data);

        // Check for existing sessions and logout from them
        $this->auth->logout_other_sessions($user_id);

        // Redirect the user to the dashboard
        redirect('dashboard');
    } else {
        // Invalid credentials, show error message
        $this->session->set_flashdata('error', 'Invalid username or password');
        redirect('login');
    }
}

// In your authentication library
public function logout_other_sessions($user_id) {
    // Get the session ID from the cookie
    $session_id = $this->input->cookie('session_id');

    // Check if there are any existing sessions for the user
    $this->db->where('user_id', $user_id);
    $this->db->where('session_id !=', $session_id);
    $query = $this->db->get('sessions');

    if ($query->num_rows() > 0) {
        // Logout from all other sessions
        foreach ($query->result