
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>guest book data</h5>
                </div>
            </div>
            <div class="panel-body">
              <div class="col-md-12">
                <div class="btn-group pull-left mt-10" role="group">
                    <button type="button" onclick="bttn_add_guestbook()" id="bttnAdd" class="btn bg-black btn-wide"><i class="fa fa-plus"></i>add</button>
                    <button type="button" onclick="reload_table()" id="bttnReload" class="btn bg-black btn-wide"><i class="fa fa-refresh"></i>reload table</button>
                </div>
                <!-- /.btn-group -->
              </div>
              <br><br><br><br>
              <div class="col-md-12">
                  <table id="table" cellspacing="0" width="100%" class="table table-striped dt-responsive nowrap">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>name</th>
                              <th>email</th>
                              <th>telp</th>
                              <th>province</th>
                              <th>city</th>
                              <th>district</th>
                              <th>option</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>
    <!-- /.col-md-12 -->
</div>
<!-- /.row -->
