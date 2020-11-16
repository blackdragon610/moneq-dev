$('.btn-delete').bind('click', '', function(){
	if(window.confirm("一度削除したデータは、元に戻せません。\n実行しても宜しいですか？")){
		return true;
	}
	
	return false;	
});

function checkAll(my, cl){
	if ($(my).prop('checked')){
		$(cl).prop('checked', 'checked');	
	}else{
		$(cl).prop('checked', '');			
	}
	
}
function onHref(message, href){
	
	
	if(window.confirm(message)){
		location.href=href;
	}
	
	return false;	
}

function onSubmit(id, message, mode){
	
	if (!message.length){
		$('#mode').val(mode);
		$('.mode').val(mode);
				
		$(id).submit();		
		return true;
	}
	
	if(window.confirm(message)){
		$('#mode').val(mode);
		$('.mode').val(mode);
				
		$(id).submit();
	}
	
	return false;	
}



/*
	*	郵便番号の自動検索
	*/
function Zip(id_zip1, id_zip2, id_pref, id_address1){
	var self = this;

	self.id_zip1 = id_zip1;
	self.id_zip2 = id_zip2;
	self.id_pref = id_pref;
	self.id_address1 = id_address1;			

	
	
	this.changeZip = function(){
		var zipcode = $(self.id_zip1).val() + $(self.id_zip2).val();
		
		
		if (zipcode.length > 6){
		    $.ajax({
		        type:'get',
		        url:'/api/zip/',
		        cache:false,
		        data:{'zipcode':zipcode}
		    }).done(function(data){
			    var arrayData = data.split('|');
			    
			    if (arrayData[0] != '該当する住所が見つかりませんでした。'){
				    $(self.id_pref).val(arrayData[0]);
				    $(self.id_address1).val(arrayData[1] + arrayData[2]);
				   }
		    });
		}
		
	}

	this.changeZip();

	$(self.id_zip1).bind('keyup', '', self.changeZip);
	$(self.id_zip2).bind('keyup', '', self.changeZip);		
}
/*
	*	地域から、組までのjs処理関数
	*/

function Selects(id_shiku_id, id_school_id, id_nen, id_kumi, shiku, school, nen){		
		var self = this;
		this.id_shiku_id = id_shiku_id;
		this.id_school_id = id_school_id;
		this.id_nen = id_nen;
		this.id_kumi = id_kumi;
		
		this.shiku = shiku;
		this.school = school;
		this.nen = nen;
		this.kumi2 = '';

		//組を表示するか否かの判定
		this.kumiJudg = function(value){		
			if ((self.nen == '1') || (self.nen == '2') || (self.nen == '3') || (!self.nen.length)){
				$(self.id_kumi).css('display', 'inline');	
						
				if ($(self.id_kumi).val() == value){													
					$(self.id_kumi).val('');		
				}
		
			}else{

				
				if ($(self.id_kumi).val() != value){		
					kumi2 = $(self.id_kumi).val();
				}
				
				$(self.id_kumi).val(value);													
				$(self.id_kumi).css('display', 'none');													


			}													
		}

		this.getKumi = function(){
		  var school_id = $('#id_school_id option:selected').val();
		  var shiku_id = $('#id_shiku_id option:selected').val();                  
		  
		  if(school_id != '' && shiku_id != '') {
		    $.ajax({
		        type:'get',
		        url:'/api/school/kumi/',
		        cache:false,
		        data:{'submode':'options', ku_id:shiku_id, 'school_id':school_id,kumi:self.kumi}
		    }).done(function(data){
//		        $('#id_kumi').html('<option value="">未選択です</option>' +data);
		    });
		    
		    
		  }
		}
	
		this.getCity = function(){
		  var tmp_id = $(self.id_shiku_id).val();

		  if(tmp_id != '') {		    
		      $.ajax({
		        type:'get',
		        url:'/api/school/one/',
		        cache:false,
		        data:{'submode':'options', ku_id:tmp_id,school_id:self.school}
		    }).done(function(data){	   
		        $(self.id_school_id).html(data);       
		        this.getNen();
		     });      
		  }			          
		}
		
		this.getNen = function(){
		   $.ajax({
		    type:'get',
		    url:'/api/school/nen/',
		    cache:false,
		    data:{kumi:self.nen}
			}).done(function(data){
		    $(self.id_nen).html('<option value="">未選択です</option>' + data);
		    getKumi();
		  });
		                
		  
		}


		self.kumiJudg();

  	$(id_nen).bind('change', '', function(){
	  	self.nen = $(this).val();
			self.kumiJudg();
		});
			                
    $(id_shiku_id).change(function(){
				self.getCity();	                    
    });


    $(self.id_school_id).change(self.getKumi);
                	
}