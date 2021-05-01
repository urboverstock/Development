 <?php
 	use App\Models\ProductImage;
 	
 	if(!function_exists('emailSend')) {
		// This function use  for email send 
		function emailSend($postData){ 
		    
		    // echo "<pre>"; print_r($postData); die;

			try{
				$email =  Mail::send($postData['layout'], $postData, function($message) use ($postData) {

					$message->to($postData['email'])
					        ->subject($postData['subject']); 
					//$message->setbody($postData['token']);
					$message->from(FROM_EMAIL_ADDRESS);
				});


				$response['status'] = true;
				$response['message'] = "Mail sent successully.";
				return $response;
			}catch(\Execption $e){
		        $response['status'] = false;
		        $response['message'] = $e->getMessage();
		    	return $response;
		    }
		}
	}

	// UPLOAD IMAGES FOR USER
	if(!function_exists('productDefaultImage')) {
		function productDefaultImage($productId) {			
			$file = '/assets/images/section-4/1.png';
			$productImage = ProductImage::where('product_id', $productId)
										->where('file_type', PRDOCUT_IMAGE_TYPE)
										->orderBy('file_type', 'ASC')
										->select('file')->first();
			
			if($productImage) {
				if(file_exists($productImage->file)) {
					$file = $productImage->file;					
				} 
			}
			return asset($file);
		}
	}


	if(!function_exists('debug')) {
		function debug($array=[]) {
			echo "<pre>"; print_r($array); die;
		}
	}
   