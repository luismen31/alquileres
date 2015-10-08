$(function(){
	$('#table-empresa').bootstrapTable({
		url: 'datagrid/empresa',
		height: 300,
		sidePagination: 'server'		
	});
});