$(window).load(function() {

jQuery('#fkl_franklinbundle_intervention_date_from').datetimepicker({
  format:'Y-m-d H:i',
  onShow:function( ct ){
   this.setOptions({
    maxDate:jQuery('#fkl_franklinbundle_intervention_date_to').val(),formatDate:'Y-m-d H:i'
   })
  },
 });
 jQuery('#fkl_franklinbundle_intervention_date_to').datetimepicker({
  format:'Y-m-d H:i',
  onShow:function( ct ){
   this.setOptions({
    minDate:jQuery('#fkl_franklinbundle_intervention_date_from').val(),formatDate:'Y-m-d H:i'
   })
  },
 });
  jQuery('#fkl_franklinbundle_command_date').datetimepicker({
  format:'Y-m-d H:i'
 });
});