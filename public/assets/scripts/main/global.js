$(document).ready(()=>{
	materializeInit();
});

var materializeInit = () => {
	$('.sidenav').sidenav();
	$('select').formSelect();
	$('.collapsible').collapsible();
	$('.tooltipped').tooltip();
	$('.tabs').tabs();
	$('.table').DataTable();
	$('.fixed-action-btn').floatingActionButton();
	$('.tooltipped').tooltip();
	$('.modal').modal();
	$('.materialboxed').materialbox();
};
