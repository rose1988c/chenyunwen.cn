@section('content')
<div class="table-responsive">
  <table class="table" id="table2">
      <thead>
         <tr>
            <th>id</th>
            <th>username</th>
            <th>角色</th>
            <th>Email</th>
            <th>ip</th>
            <th>最后登录时间</th>
            <th>操作</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ((array)$users as $user) { ?>
         <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['username']}}</td>
            <td><?php echo \Service\Common\Html::$roles[$user['roleid']];?></td>
            <td class="center">{{$user['email']}}</td>
            <td>{{$user['ip']}}</td>
            <td class="center">{{$user['login_at']}}</td>
            <td class="center"></td>
         </tr>
         <?php }?>
      </tbody>
   </table>
</div><!-- table-responsive -->
          
@stop

@section('footer')

<script src="{{asset('/assets/bracket/js/jquery.datatables.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/chosen.jquery.min.js')}}"></script>

<script>
  jQuery(document).ready(function() {

    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
	    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>
@stop
