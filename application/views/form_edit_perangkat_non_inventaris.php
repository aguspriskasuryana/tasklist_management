
<?php $id = $this->session->userdata('user_data');
 ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-4">

			         <section class="panel">
                  
                  <section class="panel-body">
                    <article class="media">
                          <img src="<?php 
                            $file = $query['img_file'];
                            $img = "perangkatni/default.jpg"; 
                            if ($file){
                              $img = "perangkatni/".$query['img_file']; 
                            }
                            echo base_url($img);

                            ?>" height="250px">
                    </article>
                  </section>

                  <a href="#" data-toggle="modal" data-target="#modal_form_gambar" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i> </a>
                
             </section>
		</div>
		<div class="col-sm-8">

			 <section class="panel">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                      </li>
                    </ul>
                    <h>DESCRIPTION</h>                 
                  </header>
                  <section class="panel-body">
                    <article class="media">
                      <table class="table">
                        <thead>
                          <tr>
                            <th width="30%">Field</th>
                            <th>DESCRIPTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Judul</td>
                            <td><?php echo $query['nama_perangkat_non_inventaris'] ;?></td>
                          </tr>
                          <tr>
                            <td>Lokasi</td>
                            <td><?php echo $query['lokasi_perangkat_non_inventaris']?></td>
                          </tr>
                          <tr>
                            <td>Unit Type</td>
                            <td><?php echo $query['unit_type']?></td>
                          </tr>                          
                          <tr>
                            <td>Model</td>
                            <td><?php echo $query['model']?></td>
                          </tr>
                          <tr>
                            <td>Manufacture</td>
                            <td><?php echo $query['manufacture']?></td>
                          </tr>
                          <tr>
                            <td>User</td>
                            <td><?php echo $query['user']?></td>
                          </tr>
                          <tr>
                            <td>SN</td>
                            <td><?php echo $query['sn']?>
                            </td>
                          </tr>
                          <tr>
                            <td>Performance</td>
                            <td><?php echo $query['last_performance']?></td>
                          </tr>
                        </tbody>
                      </table>
                    </article>
                  </section>

          <a href="#" data-toggle="modal" data-target="#modal_form_umum" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i></a>


          
                
             </section>
             
		</div>
	</div>

  <div class="row">
    <div class="col-sm-6">

               <section class="panel">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                      </li>
                    </ul>
                   <h> Desain dan Spesifikasi</h>

                   <a href="#" data-toggle="modal" data-target="#modal_form_umum_desain_dan_spesifikasi" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i></a>

                   <a href="#" data-toggle="modal" data-target="#modal_form_file_desain_dan_spesifikasi" class="btn btn-primary btn-xs form" id="play" title="Klik untuk upload!"><i class="fa fa-upload"></i></a>

                        <?php if ($query['file_desain_dan_spesifikasi']){?>
                          <a href="<?php 
                            $file = $query['file_desain_dan_spesifikasi'];
                            $img = "perangkatni/default.jpg"; 
                            if ($file){
                              $img = "perangkatni/".$query['file_desain_dan_spesifikasi']; 
                            }
                            echo base_url($img);

                            ?>" class="btn btn-primary btn-xs form" ><i class="fa fa-download"></i></a>
                        <?php } ?>                   
                  </header>
                  <section class="panel-body">
                    <article class="media">
                      
                      <div class="media-body">                        
                        <?php echo $query['desain_dan_spesifikasi'];?>
                        <table  class="table" border="1" data-ride="datatables">
                          
                            <tbody>
                          <?php 
                          if($list_perangkat_non_inventaris_desain_dan_spesifikasi){
                          foreach($list_perangkat_non_inventaris_desain_dan_spesifikasi as $list_perangkat_non_inventaris_desain_dan_spesifikasi){
                          ?>
                            <tr>
                              <td><a href="<?php echo site_url('perangkat_non_inventaris/edit_perangkat_non_inventaris_desain_dan_spesifikasi/'.$list_perangkat_non_inventaris_desain_dan_spesifikasi['id_perangkat_non_inventaris_desain_dan_spesifikasi']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><?php echo $list_perangkat_non_inventaris_desain_dan_spesifikasi['nama_keterangan']?></a></td>
                              <td><?php echo $list_perangkat_non_inventaris_desain_dan_spesifikasi['value_keterangan']?></td>

                              <td>                          
                              </td>
                              
                            </tr>
                          <?php
                            }
                          }
                          ?>
                            </tbody>
                          </table>
                        
                      </div>
                      <div class="pull-right">
                        
                      </div>
                    </article>
                  </section>
                
             </section>
    </div>

    <div class="col-sm-6">

               <section class="panel">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                      </li>
                    </ul>
                   <h> Setup Configuration</h> <a href="#" data-toggle="modal" data-target="#modal_form_umum_setup_configuration" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i></a> <a href="#" data-toggle="modal" data-target="#modal_form_file_setup_configuration" class="btn btn-primary btn-xs form" id="play" title="Klik untuk upload!"><i class="fa fa-upload"></i></a>

                        <?php if ($query['file_setup_configuration']){?>
                          <a href="<?php 
                            $file = $query['file_setup_configuration'];
                            $img = "perangkatni/default.jpg"; 
                            if ($file){
                              $img = "perangkatni/".$query['file_setup_configuration']; 
                            }
                            echo base_url($img);

                            ?>" class="btn btn-primary btn-xs form" ><i class="fa fa-download"></i></a>
                        <?php } ?>                 
                  </header>
                  <section class="panel-body">
                    <article class="media">
                      
                      <div class="media-body">                        
                        <?php echo $query['setup_configuration'];?>
                        
                      </div>
                      <div class="pull-right">
                        
                      </div>
                    </article>
                  </section>
                
             </section>
    </div>
  </div>



  <div class="row">
    <div class="col-sm-6">

               <section class="panel">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                      </li>
                    </ul>
                   <h> Availability</h>

                   <a href="#" data-toggle="modal" data-target="#modal_form_umum_availability" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i></a>

                   <a href="#" data-toggle="modal" data-target="#modal_form_file_availability" class="btn btn-primary btn-xs form" id="play" title="Klik untuk upload!"><i class="fa fa-upload"></i></a>

                        <?php if ($query['file_availability']){?>
                          <a href="<?php 
                            $file = $query['file_availability'];
                            $img = "perangkatni/default.jpg"; 
                            if ($file){
                              $img = "perangkatni/".$query['file_availability']; 
                            }
                            echo base_url($img);

                            ?>" class="btn btn-primary btn-xs form" ><i class="fa fa-download"></i></a>
                        <?php } ?>                   
                  </header>
                  <section class="panel-body">
                    <article class="media">
                      
                      <div class="media-body">                        
                        <?php echo $query['availability'];?>
                        
                      </div>
                      <div class="pull-right">
                        
                      </div>
                    </article>
                  </section>
                
             </section>
    </div>

    <div class="col-sm-6">

               <section class="panel">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                      </li>
                    </ul>
                   <h> Reliability</h> <a href="#" data-toggle="modal" data-target="#modal_form_umum_reliability" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i></a> <a href="#" data-toggle="modal" data-target="#modal_form_file_reliability" class="btn btn-primary btn-xs form" id="play" title="Klik untuk upload!"><i class="fa fa-upload"></i></a>

                        <?php if ($query['file_reliability']){?>
                          <a href="<?php 
                            $file = $query['file_reliability'];
                            $img = "perangkatni/default.jpg"; 
                            if ($file){
                              $img = "perangkatni/".$query['file_reliability']; 
                            }
                            echo base_url($img);

                            ?>" class="btn btn-primary btn-xs form" ><i class="fa fa-download"></i></a>
                        <?php } ?>                 
                  </header>
                  <section class="panel-body">
                    <article class="media">
                      
                      <div class="media-body">                        
                        <?php echo $query['reliability'];?>
                        
                      </div>
                      <div class="pull-right">
                        
                      </div>
                    </article>
                  </section>
                
             </section>
    </div>

    
  </div>


  <div class="row">
    <div class="col-sm-12">

               <section class="panel">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                      </li>
                    </ul>
                   <h> Performance</h>

                   <a href="#" data-toggle="modal" data-target="#modal_form_umum_performance" class="btn btn-primary btn-xs form" id="play" title="Klik untuk edit!"><i class="fa fa-edit"></i></a>

                   <a href="#" data-toggle="modal" data-target="#modal_form_file_performance" class="btn btn-primary btn-xs form" id="play" title="Klik untuk upload!"><i class="fa fa-upload"></i></a>

                        <?php if ($query['file_performance']){?>
                          <a href="<?php 
                            $file = $query['file_performance'];
                            $img = "perangkatni/default.jpg"; 
                            if ($file){
                              $img = "perangkatni/".$query['file_performance']; 
                            }
                            echo base_url($img);

                            ?>" class="btn btn-primary btn-xs form" ><i class="fa fa-download"></i></a>
                        <?php } ?>                   
                  </header>
                  <section class="panel-body">
                    <article class="media">
                      
                      <div class="media-body">                        
                        <?php echo $query['performance'];?>
                        
                      </div>
                      <div class="pull-right">
                        
                      </div>
                    </article>
                  </section>
                
             </section>
    </div>


    
  </div>



  <div id="modal_form_gambar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_gambar/'.$query['id_perangkat_non_inventaris']); ?>" method="post" enctype="multipart/form-data">
          <?php echo $this->csrf->get_html(); ?>

        <div class="form-group">
          <div class="col-lg-10">
          <input type="file" class="btn btn-default"  accept=".jpg" name="img_file"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
          maksimal ukuran foto 2Mb
          </div>
        </div>
                
        <span id="confirmMessage" class="confirmMessage"></span>
        
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<div id="modal_form_file_desain_dan_spesifikasi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_file_desain_dan_spesifikasi/'.$query['id_perangkat_non_inventaris']); ?>" method="post" enctype="multipart/form-data">
          <?php echo $this->csrf->get_html(); ?>

        <div class="form-group">
          <div class="col-lg-10">
          <input type="file" class="btn btn-default"  accept=".pdf" name="file_desain_dan_spesifikasi"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
          maksimal ukuran 2Mb
          </div>
        </div>
                
        <span id="confirmMessage" class="confirmMessage"></span>
        
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_form_file_setup_configuration" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_file_setup_configuration/'.$query['id_perangkat_non_inventaris']); ?>" method="post" enctype="multipart/form-data">
          <?php echo $this->csrf->get_html(); ?>

        <div class="form-group">
          <div class="col-lg-10">
          <input type="file" class="btn btn-default"  accept=".pdf" name="file_setup_configuration"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
          maksimal ukuran 2Mb
          </div>
        </div>
                
        <span id="confirmMessage" class="confirmMessage"></span>
        
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_form_file_availability" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_file_availability/'.$query['id_perangkat_non_inventaris']); ?>" method="post" enctype="multipart/form-data">
          <?php echo $this->csrf->get_html(); ?>

        <div class="form-group">
          <div class="col-lg-10">
          <input type="file" class="btn btn-default"  accept=".pdf" name="file_availability"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
          maksimal ukuran 2Mb
          </div>
        </div>
                
        <span id="confirmMessage" class="confirmMessage"></span>
        
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_form_file_reliability" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_file_reliability/'.$query['id_perangkat_non_inventaris']); ?>" method="post" enctype="multipart/form-data">
          <?php echo $this->csrf->get_html(); ?>

        <div class="form-group">
          <div class="col-lg-10">
          <input type="file" class="btn btn-default"  accept=".pdf" name="file_reliability"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
          maksimal ukuran 2Mb
          </div>
        </div>
                
        <span id="confirmMessage" class="confirmMessage"></span>
        
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_form_file_performance" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_file_performance/'.$query['id_perangkat_non_inventaris']); ?>" method="post" enctype="multipart/form-data">
          <?php echo $this->csrf->get_html(); ?>

        <div class="form-group">
          <div class="col-lg-10">
          <input type="file" class="btn btn-default"  accept=".pdf" name="file_performance"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
          maksimal ukuran 2Mb
          </div>
        </div>
                
        <span id="confirmMessage" class="confirmMessage"></span>
        
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>



<div id="modal_form_umum_desain_dan_spesifikasi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_umum_desain_dan_spesifikasi/'.$query['id_perangkat_non_inventaris']); ?>" method="post">
        <?php echo $this->csrf->get_html(); ?>
        <div class="form-group">
          <div class="col-sm-8">
              Desain dan Spesifikasi
           </div> 
        </div>
        <div class="form-group">
          <div class="col-sm-8">
              <?php echo $this->ckeditor->editor("desain_dan_spesifikasi",$query['desain_dan_spesifikasi'] );?>
           </div> 
        </div>
        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="form-group">
          <div class="col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
           </div> 
        </div>

        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_form_umum_setup_configuration" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_umum_setup_configuration/'.$query['id_perangkat_non_inventaris']); ?>" method="post">
        <?php echo $this->csrf->get_html(); ?>
        <div class="form-group">
          <div class="col-sm-8">
              Setup Configuration
           </div> 
        </div>
        <div class="form-group">
          <div class="col-sm-8">
              <?php echo $this->ckeditor->editor("setup_configuration",$query['setup_configuration'] );?>
           </div> 
        </div>
        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="form-group">
          <div class="col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
           </div> 
        </div>
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_form_umum_availability" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_umum_availability/'.$query['id_perangkat_non_inventaris']); ?>" method="post">
        <?php echo $this->csrf->get_html(); ?>
        <div class="form-group">
          <div class="col-sm-8">
              Avilability
           </div> 
        </div>
        <div class="form-group">
          <div class="col-sm-8">
              <?php echo $this->ckeditor->editor("availability",$query['availability'] );?>
           </div> 
        </div>
        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="form-group">
          <div class="col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
           </div> 
        </div>

        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_form_umum_reliability" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_umum_reliability/'.$query['id_perangkat_non_inventaris']); ?>" method="post">
        <?php echo $this->csrf->get_html(); ?>
        <div class="form-group">
          <div class="col-sm-8">
              Reliability
           </div> 
        </div>
        <div class="form-group">
          <div class="col-sm-8">
              <?php echo $this->ckeditor->editor("reliability",$query['reliability'] );?>
           </div> 
        </div>
        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="form-group">
          <div class="col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
           </div> 
        </div>
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_form_umum_performance" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_umum_performance/'.$query['id_perangkat_non_inventaris']); ?>" method="post">
        <?php echo $this->csrf->get_html(); ?>
        <div class="form-group">
          <div class="col-sm-8">
              performance
           </div> 
        </div>
        <div class="form-group">
          <div class="col-sm-8">
              <?php echo $this->ckeditor->editor("performance",$query['performance'] );?>
           </div> 
        </div>
        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="form-group">
          <div class="col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
           </div> 
        </div>
        </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_form_umum" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" id="stop" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

          <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/perangkat_non_inventaris/update_data_umum/'.$query['id_perangkat_non_inventaris']); ?>" method="post">
        <?php echo $this->csrf->get_html(); ?>
         
        <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_perangkat_non_inventaris" value="<?php echo $query['nama_perangkat_non_inventaris'] ;?>" data-required="true" name="nama_perangkat_non_inventaris" >
           </div> 
        </div>

        <div class="form-group">
        <label class="col-lg-2 control-label">Lokasi</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="lokasi_perangkat_non_inventaris" value="<?php echo $query['lokasi_perangkat_non_inventaris'] ;?>" data-required="true" name="lokasi_perangkat_non_inventaris" >
           </div> 
        </div>

        <div class="form-group">
        <label class="col-lg-2 control-label">Item Type </label>
          <div class="col-sm-8">
              <select name="id_item_type" id="id_item_type" class="form-control m-b">
                  <?php 

                  foreach($list_item_type as $item_types){
                  if ($item_types['id_item_type'] == $query['id_item_type']){

                    ?>
                    <option value="<?php echo $item_types['id_item_type'];?>" selected ><?php echo $item_types['item']?></option>
                  <?php } else {  ?>
                    <option value="<?php echo $item_types['id_item_type'];?>" ><?php echo $item_types['item']?></option>
                  <?php 
                    }
                  }
                  ?>
              </select>
           </div> 
        </div>

        <div class="form-group">
        <label class="col-lg-2 control-label">Manufacture</label>
          <div class="col-sm-8">
              <select name="id_manufacture" id="id_manufacture" class="form-control m-b">
                  <?php 

                  foreach($list_manufacture as $manufactures){
                  if ($manufactures['id_manufacture'] == $query['id_manufacture']){

                    ?>
                    <option value="<?php echo $manufactures['id_manufacture'];?>" selected ><?php echo $manufactures['manufacture']?></option>
                  <?php } else {  ?>
                    <option value="<?php echo $manufactures['id_manufacture'];?>" ><?php echo $manufactures['manufacture']?></option>
                  <?php 
                    }
                  }
                  ?>
              </select>
           </div> 
        </div>
        

        <div class="form-group">
        <label class="col-lg-2 control-label">Unit Type</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="unit_type" value="<?php echo $query['unit_type'] ;?>" data-required="true" name="unit_type" >
           </div> 
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">Manufacture</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="manufacture" value="<?php echo $query['manufacture'] ;?>" data-required="true" name="manufacture" >
           </div> 
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">Model</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="model" value="<?php echo $query['model'] ;?>" data-required="true" name="model" >
           </div> 
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">User</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="user" value="<?php echo $query['user'] ;?>" data-required="true" name="user" >
           </div> 
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">SN</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="sn" value="<?php echo $query['sn'] ;?>" data-required="true" name="sn" >
           </div> 
        </div>

        <div class="form-group">
        <label class="col-lg-2 control-label">Performance</label>
          <div class="col-sm-8">
            <select name="last_performance" id="last_performance" class="form-control m-b">
            <?php foreach($performance as $last_performance){
            if ($last_performance == $query['last_performance']){
              ?>
              <option value="<?php echo $last_performance;?>" selected><?php echo $last_performance?></option>
              <?php
            } else {
            ?>
              <option value="<?php echo $last_performance;?>" ><?php echo $last_performance?></option>
            <?php 
              }
            }

            ?>
            </select>
           </div>
        </div>

        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
          </div>
        </div>
        </form>
       
    </div>

  </div>
</div>



</section>



<script>
$('.tanggal').datepicker();
$('.tanggaldit').datepicker();
</script>
<!-- wysiwyg -->
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/demo.js" cache="false"></script>