<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_settings extends CI_Model {

    var $column = array('name','email','telp','prov','kota','kecamatan'); //global datatables value
    var $order = array('id' => 'desc'); // sort by ID DESCENDING THE NEW DATA

    public function get_data_value($table){
    		return $this->db->get($table); // get value
    }

    public function get_data($table,$id){
        $this->db->where('id', $id);
        return $this->db->get($table); // get value
    }
    public function get_data_kecamatan($table, $id){
        $this->db->where('id_kota', $id);
        return $this->db->get($table); // get value
    }

    function save($table,$data) // function save to global table $table
  	{
  		 $this->db->insert($table, $data);
  		 return $this->db->insert_id();
  	}

    function update($where, $data, $table)
  	{
  		$this->db->update($table, $data, $where);
  		return $this->db->affected_rows();
  	}

    function delete($id,$table)
  	{
       $this->db->where('id', $id);
  		 $this->db->delete($table);
  	}

    private function _get_datatables_query($table)
  	{
    		$this->db->from($table);
  		  $i = 0;
  		  foreach ($this->column as $item) // loop column
  		  {
  			if($_POST['search']['value']) // if datatable send POST for search
  			{
  				if($i===0) // first loop
  				{
  					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
  					$this->db->like($item, $_POST['search']['value']);
  				}
  				else
  				{
  					$this->db->or_like($item, $_POST['search']['value']);
  				}
  				if(count($this->column) - 1 == $i) //last loop
  					$this->db->group_end(); //close bracket
  			}
  			$column[$i] = $item; // set column array variable to order processing
  			$i++;
  		}

  		if(isset($_POST['order'])) // here order processing
  		{
  			   $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
  		}
  		else if(isset($this->order))
  		{
    			 $order = $this->order;
    			 $this->db->order_by(key($order), $order[key($order)]);
  		}
  	}

  	function get_datatables($table)
  	{
    		$this->_get_datatables_query($table);
    		if($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);
    		$query = $this->db->get();
    		return $query->result();
  	}
    function count_filtered($table)
  	{
    		$this->_get_datatables_query($table);
    		$query = $this->db->get();
    		return $query->num_rows();
  	}

  	function count_all($table)
  	{
    		$this->db->from($table);
    		return $this->db->count_all_results();
  	}

}
