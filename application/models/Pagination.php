<?php
	class Pagination extends CI_Model
	{
		public function __construct() 
        {
            parent:: __construct();
            $this->load->helper("url");
            $this->load->library("pagination");
        }
				
		function make_pagging($url, $total_rows, $per_page, $uri=0)
        {
			//// Set base_url for every links
            $config["base_url"] = $url;
            $config["total_rows"] = $total_rows;
            $config["per_page"] = $per_page;
            $config["uri_segment"] = $uri;
            $config['num_links'] = 8;
            $config['use_page_numbers']  = TRUE;
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
			$config['page_query_string'] = False;
            $config['next_link'] = '&raquo;';
            $config['prev_link'] = '&laquo;';

            $config['cur_tag_open'] = "<li class='active'><a target='_self' href='#'>";
            $config['cur_tag_close'] = "</a></li>";
			//To initialize "$config" array and set to pagination library.
            $this->pagination->initialize($config);

            $page = ($this->uri->segment($config["uri_segment"]))? $this->uri->segment($config["uri_segment"]) : 0;
            $offset = ($page  == 0) ? 0 : ($page * $config['per_page']) - $config['per_page'];
        }
	}
		
	
	