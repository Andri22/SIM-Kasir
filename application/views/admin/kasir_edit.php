   

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Data User</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Data User</h1>
            </div>
        </div><!--/.row-->    

        <div class="container">

        
        <div class="panel panel-default">  
            <div class="panel panel-body">

            <form method="post" action="<?php echo base_url(). "index.php/Admin/update_kasir"?>">


          <div class="form-group row">
            <label for="idkasir" class="col-sm-2 col-form-label">ID User</label>
            <div class="col-sm-10">
              <input type="text" readonly="readonly"  name="id_user" class="form-control" value="<?php echo $id_user?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            <input type="text"  name="nama" class="form-control" id="nama"  value="<?php echo $nama?>">
            </div>
          </div>

              
          <button type="submit" class="btn btn-primary pull-right">Save</button>

        </form>
          
        
        
        </div>                      
        </div>
        </div>
        </div>
        
</div>  <!--/.main-->