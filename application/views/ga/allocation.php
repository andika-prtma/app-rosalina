
        <div class="right_col" role="main">
        	<div class="">
	            <div class="page-title">
	            	<div class="title_left">
	                	<h3>Allocation Driver</h3>
	            	</div>
	            </div>
	        <div class="clearfix"></div>
	            <div class="row" style="display: inline-block;" >
		            <div class="tile_count">
		              <div class="col-md-3 col-sm-4  tile_stats_count">
		                <span class="count_top"><i class="fa fa-user"></i> Today</span>
		                <div class="count">5</div>
		                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
		              </div>
		              <div class="col-md-3 col-sm-4  tile_stats_count">
		                <span class="count_top"><i class="fa fa-clock-o"></i> Tomorrow</span>
		                <div class="count">5</div>
		                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
		              </div>
		              <div class="col-md-3 col-sm-4  tile_stats_count">
		                <span class="count_top"><i class="fa fa-user"></i> No Driver</span>
		                <div class="count green">4</div>
		                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
		              </div>
		              <div class="col-md-3 col-sm-4  tile_stats_count">
		                <span class="count_top"><i class="fa fa-user"></i> Assigned Driver</span>
		                <div class="count">4,567</div>
		                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
		              </div>
		            </div>
          		</div>
				<div class="row">
	            	<div class="col-md-12 col-sm-12">
	            		<div class="x_panel">
	            			<div class="x_title">
		                    	<div class="clearfix"></div>
		                  	</div>
	            			<div class="x_content">
	            				<div class="item form-group">
	            					<label for="reqfor" class="col-form-label col-md-2 col-sm-12">Date Range</label>
		                        	<div class="col-md-3 col-sm-12">
		                          		<input type="date" id="reqby" name="reqby" required="required" class="form-control">
		                        	</div>
		                        	To
		                        	<div class="col-md-3 col-sm-12" style="">
		                          		<input type="date" id="reqby" name="reqby" required="required" class="form-control">
		                        	</div>
		                        	<div class="col-md-4 col-sm-12" style="text-align: right;">
				                      	<button class="btn btn-primary">Filter</button>
		                        	</div>
		                      	</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
	            <div class="row">
              		<div class="col-md-12 col-sm-12">
                		<div class="x_panel">
		                  	<div class="x_content">
			                	<div class="row">
			                    	<div class="col-sm-12">
			                        	<div class="card-box table-responsive">	
				                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
				                            	<thead>
				                                	<tr>
				                                		<th width="5%">No</th>
				                                  		<th width="15%">Nomor SPD</th>
				                                  		<th width="15%">Waktu berangkat</th>
				                                  		<th>Lokasi</th>
				                                  		<th>Action</th>
				                                	</tr>
				                              	</thead>
		                              			<tbody>
		                              				<?php $no = 1; ?>
		                                			<?php foreach ($spd as $s): ?>
		                                				<tr>
		                                					<td><?= $no ?></td>
		                                					<td><?= $s->nomor_spd ?></td>
		                                					<td><?= date('d-m-Y H:i', $s->created_at) ?></td>
		                                					<td><?= $s->agenda ?></td>
		                                					<td>
		                                						<a href="" class="badge badge-success">Detail</a>
		                                						<a href="" class="badge badge-primary">Revision</a>
		                                					</td>
		                                				</tr>
		                                			<?php $no++ ?>
		                                			<?php endforeach ?>
		                              			</tbody>
		                            		</table>
			                          	</div>
			                        </div>
			                    </div>
			                </div>
			           	</div>
               		</div>
              	</div>
            </div>
    	</div>
	</div>

