<!-- js placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{URL::to('public/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/js/jquery.scrollTo.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{URL::to('public/js/jquery.customSelect.min.js')}}" ></script>
<script type="text/javascript" src="{{URL::to('public/js/respond.min.js')}}" ></script>
<script type="text/javascript" src="{{URL::to('public/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{URL::to('public/Adminassets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/Adminassets/data-tables/DT_bootstrap.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<!--select2-->
<script type="text/javascript" src="{{URL::to('public/Adminassets/select2/js/select2.min.js')}}"></script>
<!--common script for all pages-->
<script src="{{URL::to('public/js/common-scripts5e1f.js?v=2')}}"></script>
<!--script for this page-->
<script src="{{URL::to('public/js/count.js')}}"></script>

<script>
// block inspect elements
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
// end
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
  //custom select box

  $(function(){
      $('select.styled').customSelect();
  });
</script>
@yield('script')
</body>


</html>
