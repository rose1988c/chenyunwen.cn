@section('content')
<div class="table-responsive">
  <table class="table table-bordered table-hover" id="table2">
      <thead>
         <tr>
            <th>id</th>
            <th>username</th>
            <th>角色</th>
            <th>Email</th>
            <th>ip</th>
            <th>最后登录时间</th>
            <th>&nbsp;</th>
         </tr>
      </thead>
      <tbody>
      </tbody>
   </table>
</div><!-- table-responsive -->
          
<!-- Modal -->
<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-static">Launch Modal</button>

<!-- Modal -->
<div class="modal fade bs-example-modal-static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h4 class="modal-title">Static Background</h4>
        </div>
        <div class="modal-body">
            Specify static for a backdrop which doesn't close the modal on click.
        </div>
    </div>
  </div>
</div>
<!--  -->
<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@stop

@section('css')
    {{ HTML::style('/assets/package/datatables/css/jquery.dataTable_themebracket.css?' . date("Ymd", time()) . '.css') }}
@stop

@section('footer')
<script src="{{asset('/assets/package/datatables/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('/assets/bracket/js/chosen.jquery.min.js')}}"></script>

<script type="text/javascript">
  jQuery(document).ready(function() {
	  
    jQuery('#table2').dataTable({
      "processing": true,
      "serverSide": true,
      "sAjaxSource": "{{url('/manage/user/list/ajax')}}",
      "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
          oSettings.jqXHR = $.ajax( {
            "dataType": 'json',
            "type": "GET",
            "url": sSource,
            "data": aoData,
            "success": fnCallback
          } );
      },
      "fnDrawCallback" : function(){
      	    // Chosen Select
      	    jQuery("select").chosen({
      	      'min-width': '100px',
      	      'white-space': 'nowrap',
      	      disable_search_threshold: 10
      	    });

      	    // Show aciton upon row hover
      	    jQuery('.table-hidaction tbody tr').hover(function(){
      	      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
      	    },function(){
      	      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
      	    });

      	    jQuery('.delete-row').click(function(){
      	      var c = confirm("确定要删除该用户["+ $(this).attr('title') +"]吗?");
      	      if(c)
      	        jQuery(this).closest('tr').fadeOut(function(){
      	            jQuery(this).remove();
      	        });
      	        return false;
      	    });
      },
      "sPaginationType": "full_numbers",
      "oLanguage": {
          "sUrl" : "{{asset('/assets/package/datatables/jquery.datatables.surl.cn-zn.txt')}}"
      }
    });
  
  });
</script>
@stop
