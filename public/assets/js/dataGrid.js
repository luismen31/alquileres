$(function(){
	$('#table-empresa').bootstrapTable({
		url: baseurl+'/datagrid/empresa',
		height: 260,
		sidePagination: 'server',
		pagination: true
	});
});