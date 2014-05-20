$(window).load(function() {

jQuery('#fkl_franklinbundle_intervention_date_from').datetimepicker({
  format:'Y-m-d H:i',
  onShow:function( ct ){
   this.setOptions({
    maxDate:jQuery('#fkl_franklinbundle_intervention_date_to').val()?jQuery('#fkl_franklinbundle_intervention_date_to').val():false
   })
  },
 });
 jQuery('#fkl_franklinbundle_intervention_date_to').datetimepicker({
  format:'Y-m-d H:i',
  onShow:function( ct ){
   this.setOptions({
    minDate:jQuery('#fkl_franklinbundle_intervention_date_from').val()?jQuery('#fkl_franklinbundle_intervention_date_from').val():false
   })
  },
 });
});