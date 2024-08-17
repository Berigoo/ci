<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

    var $host = 'http://localhost:8080';
    var $root = '/index.php/welcome';
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        $enpoint = '/proyek';
        $curl = curl_init($this->host . $enpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);

		$this->load->view('main', array( 'data' => json_decode($res)));
	}

	public function proyek()
	{
        $this->load->view('proyek/insert');
	}
    public function proyekcreate()
    {
        $endpoint = '/proyek';
        $data = array(
            'namaProyek'	=> $this->input->post('nama_proyek'),
            'client'		=> $this->input->post('client'),
            'tanggalMulai'	=> $this->input->post('tanggal_mulai'),
            'tanggalSelesai'=> $this->input->post('tanggal_selesai'),
            'pimpinanProyek'=> $this->input->post('pimpinan_proyek'),
            'keterangan'	=> $this->input->post('keterangan'),
            'lokasiId'		=> $this->input->post('lokasi_id')
        );

        $header = array('Content-Type:application/json');
        $curl = curl_init($this->host . $endpoint);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if($httpcode == 200){
            echo "<h1>Proyek berhasil ditambahkan</h1><br>";
            echo "<a href='/index.php'>Back</a>";
        }else{
            echo "<h1>Proyek gagal ditambahkan</h1><br>";
            echo "<p style='color: red'>";
            echo json_decode($res)->info;
            echo "</p>";
            echo "<span style='display: inline-block; width: 500px'>";
            echo "<a href='/index.php/welcome/proyek'>Back</a> &nbsp;";
            echo "<a href='/index.php/welcome/lokasi'>Tambah Lokasi</a>";
            echo "</span>";
        }
    }
	public function proyekedit($id)
	{
		$endpoint = '/proyek';
		$curl = curl_init($this->host . $endpoint . '/' . $id);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if($httpcode == 200){
			$this->load->view('proyek/edit', array('data' => json_decode($res)));
		}else if($httpcode == 404){
			$this->load->view('errors/error_404');
		}else{
			redirect('welcome');
		}
	}
	public function proyekeditpost()
	{
		$endpoint = '/proyek';
		$data = array(
			'id'			=> $this->input->post('id'),
            'namaProyek'	=> $this->input->post('nama_proyek'),
            'client'		=> $this->input->post('client'),
            'tanggalMulai'	=> $this->input->post('tanggal_mulai'),
            'tanggalSelesai'=> $this->input->post('tanggal_selesai'),
            'pimpinanProyek'=> $this->input->post('pimpinan_proyek'),
            'keterangan'	=> $this->input->post('keterangan'),
            'lokasis'		=> $this->input->post('lokasi_id')
		);

		$header = array('Content-Type:application/json');

		$curl = curl_init($this->host . $endpoint . '/' . $data['id']);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
		$res = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if($httpcode == 200){
			echo "<h1>Lokasi berhasil diedit</h1><br>";
			echo "<a href='/index.php'>Back</a>";
		}else{
			echo "<h1>Lokasi gagal diedit</h1><br>";
			echo "<p style='color: red'>";
			echo json_decode($res)->info;
			echo "</p>";
			echo "<a href='/index.php/welcome/lokasiedit/" . $data['id'] . "'>Back</a>";
		}
	}
	public function proyekdelete($id)
	{
		$endpoint = '/proyek';
		$curl = curl_init($this->host . $endpoint . '/' . $id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if($httpcode == 200){
			echo "<h1>Proyek berhasil dihapus</h1><br>";
			echo "<a href='/index.php'>Back</a>";
		}else{
			echo "<h1>Proyek gagal dihapus</h1><br>";
			echo "<a href='/index.php'>Back</a>";
		}
	}

	public function lokasi()
	{
        $this->load->view('lokasi/insert');
	}

    //TODO req validation
    public function lokasicreate()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $endpoint = '/lokasi';
            $data = array(
                'namaLokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota')
            );

            $header = array('Content-Type:application/json');

            $curl = curl_init($this->host . $endpoint);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if($httpcode == 200) {
                echo "<h1>Lokasi berhasil ditambahkan</h1><br>";
                echo "<a href='/index.php'>Back</a>";
            }else{
                echo "<h1>Lokasi gagal ditambahkan</h1><br>";
                echo "<p style='color: red'>";
                echo json_decode($res)->info;
                echo "</p>";
                echo "<a href='/index.php/welcome/lokasi'>Back</a>";
            }
        }else{
            redirect('welcome/lokasi');
        }
    }

	public function lokasiedit($id)
	{
		$endpoint = '/lokasi';
		$curl = curl_init($this->host . $endpoint . '/' . $id);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if($httpcode == 200){
			$this->load->view('lokasi/edit', array('data' => json_decode($res)));
		}else if($httpcode == 404){
			$this->load->view('errors/error_404');
		}else{
			redirect('welcome');
		}
	}
	public function lokasieditpost()
	{
			$endpoint = '/lokasi';
			$data = array(
				'id' => $this->input->post('id'),
                'namaLokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota')
			);

			$header = array('Content-Type:application/json');

			$curl = curl_init($this->host . $endpoint . '/' . $data['id']);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
			$res = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);

			if($httpcode == 200){
				echo "<h1>Lokasi berhasil diedit</h1><br>";
				echo "<a href='/index.php'>Back</a>";
			}else{
				echo "<h1>Lokasi gagal diedit</h1><br>";
				echo "<p style='color: red'>";
				echo json_decode($res)->info;
				echo "</p>";
				echo "<a href='/index.php/welcome/lokasiedit/" . $data['id'] . "'>Back</a>";
			}
	}
	public function lokasidelete($id, $id2)
	{
		$endpoint = '/lokasi';
		$curl = curl_init($this->host . $endpoint . '/' . $id . '/' . $id2);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if($httpcode == 200){
			echo "<h1>Lokasi berhasil dihapus</h1><br>";
			echo "<a href='/index.php'>Back</a>";
		}else{
			echo "<h1>Lokasi gagal dihapus</h1><br>";
			echo "<a href='/index.php'>Back</a>";
		}
	}
}

