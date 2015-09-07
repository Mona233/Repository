<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index(){
            $polje = $this->session->all_userdata();
            
            $data = array();            
            if (isset($polje['logged_in']))
                $data['username'] = $polje['logged_in']['username'];
            
            $view = $this->load->view('login_form', $data, true);
            $data['body'] = $view;
            $this->load->view('main', $data);       
	}
        //if login fails, throw error
        public function error(){
            $polje = $this->session->all_userdata();
            
            $data = array();            
            if (isset($polje['logged_in']))
                $data['username'] = $polje['logged_in']['username'];            
                $data['message'] = "Krivo korisničko ime ili lozinka!";
            
            $view = $this->load->view('login_form', $data, true);
            $data['body'] = $view;
            $this->load->view('main', $data);       
	}
        
		//connection to LDAP; if it fails, only usernames in array can login
        public function check(){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            
            // LDAP CHECK            
            // $ldaprdn  = 'uid='.$username.',cn=users,dc=HOSTNAME,dc=ffzg,dc=hr';     // ldap rdn or dn
            $ldaprdn  = 'uid='.$username.',dc=ffzg,dc=hr';     // ldap rdn or dn
            $ldappass = $password;  // associated password

            // connect to ldap server
            $ldapconn = ldap_connect("ldap.ffzg.hr", 636);
            //var_dump($ldapconn);die();

            // Set some ldap options for talking to 
            // ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
            // ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

            // if ($ldapconn) {
            if (FALSE) {
                // binding to ldap server
                $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

                // verify binding
                if ($ldapbind) {
                    // LDAP bind successful
                    $sess_array = array('username' => $username);
                    $this->session->set_userdata('logged_in', $sess_array);
                    redirect("welcome");
                } else {
                    // LDAP bind failed
                    redirect("login/error");
                }
            } else {
                $allowedLogins = array("mpejicic@ffzg.hr", "vjuricic@ffzg.hr", "gvidakovic@ffzg.hr", "azuparic@ffzg.hr");
                if(in_array($username, $allowedLogins)){
                    $sess_array = array('username' => $username);
                    $this->session->set_userdata('logged_in', $sess_array);
                    redirect("welcome");
                }
                else
                    redirect("login/error");
            }       
	}
        //logout function
        function logout(){
            $this->session->sess_destroy();
            redirect("login");
        }
        
}