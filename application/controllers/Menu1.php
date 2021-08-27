        <?php

        use Dompdf\Dompdf;

        class Menu1 extends CI_Controller{
            public function __construct(){
                parent::__construct();
                // if($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
                // $this->data['aktif'] = 'menu1';
                $this->load->model('M_menu');
                $this->load->model('M_Kategori');
            }

            public function index(){
                $data['id_menu'] = $this->M_menu->getmenuid();
                $data['title'] = 'Data menuu';
                $data['all_menu'] = $this->M_menu->lihat();
                $data['no'] = 1;
                $this->template->load('template/template','menuu/lihat',$data);
              
                // $this->load->view('menuu/lihat', $this->data);
            }

            public function tambah(){
         
                $this->data['id_menu'] = $this->M_menu->getmenuid();
                // $this->data['kategori'] = $this->M_Kategori->getDataOrderByNama();
                          
                $this->load->view('menuu/tambah', $this->data);
            }

            public function proses_tambah(){
               

                $data = [
                    'id_menu' => $this->input->post('id_menu'),
                    'nama' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'ukuran' => $this ->input->post('ukuran'),
                    // 'id_kategori' => $this->input->post('id_kategori'),              
                    // 'stok' => $this->input->post('stok'),    
                ];

                $simpan = $this->M_menu->tambah($data);
                if($simpan == 1){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    Data Berhasil Disimpan
                  </div>');
                    redirect('menu1');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                    Data Gagal Disimpan
                  </div>');
                    redirect('menu1');
                }
            }

            public function ubah(){
                
                // if(!isset($id_menu)) redirect('menu1/view_data');
                $kodemenu = $this->uri->segment(3);
                echo "kode menu :" .$kodemenu;
                $data['menu'] = $this->M_Menu->ubah($kodemenu)->row_array();
                $this->load->view('menuu/ubah', $this->data);
            }

            public function proses_ubah($id_menu){
           

                $data = [
                    'id_menu' => $this->input->post('id_menu'),
                    'nama' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'ukuran' => $this ->input->post('ukuran'),
                    'id_kategori' => $this->input->post('id_kategori'),    
                ];

                if($this->M_menu->ubah($data, $id_menu)){
                    $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
                    redirect('menu1');
                } else {
                    $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
                    redirect('menu1');
                }
            }

            public function hapus($id_menu){
              $kodebarang = $this->uri->segment('3');
              $hapus = $this->M_menu->hapus($id_menu);
              if($simpan == 1){
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                Data Berhasil Dihapus
              </div>');
                redirect('menu1');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                Data Gagal Dihapus
              </div>');
                redirect('menu1');
            }
            
            }

            public function export(){
                $dompdf = new Dompdf();
                // $this->data['perusahaan'] = $this->m_usaha->lihat();
                $this->data['all_menu'] = $this->M_menu->lihat();
                $this->data['title'] = 'Laporan Data Barang';
                $this->data['no'] = 1;

                $dompdf->setPaper('A4', 'Landscape');
                $html = $this->load->view('menuu/report', $this->data, true);
                $dompdf->load_html($html);
                $dompdf->render();
                $dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
            }
        }