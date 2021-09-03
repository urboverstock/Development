 <?php
 	use App\Models\ProductImage;
 	use App\Models\Chat;
 	use App\Models\ChatRoom;
 	
 	if(!function_exists('emailSend')) {
		// This function use  for email send 
		function emailSend($postData){
		    
		    // echo "<pre>"; print_r($postData); die;

			try{
				$email =  Mail::send($postData['layout'], $postData, function($message) use ($postData) {

					$message->to($postData['email'])
					        ->subject($postData['subject']);
					$message->from('phpurban@gmail.com');
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

	if(!function_exists('UploadImage')) {
		function UploadImage($file, $destinationPath) {
			try{
				$imgName = $file->getClientOriginalName();
				$ext = explode('?', \File::extension($imgName));
				$main_ext = $ext[0];
				$finalName = time()."_".rand(1,10000).'.'.$main_ext; 
				$file->move($destinationPath, $finalName);
				return $path = $destinationPath.'/'.$finalName;
			}catch (\Execption $e) {
				$response['status'] = false;
				$response['message'] = $e->getMessage()->withInput();
				return $response;
			}
		}
	}

	if (! function_exists('unreadMessageCounter')) {
	    function unreadMessageCounter($senderId, $receiverId) {
	        return Chat::where(['sender_id' => $receiverId, 'receiver_id' => $senderId])->whereNULL('read_by')->count();
	    }
	}


	if (! function_exists('lastMessage')) {
	    function lastMessage($unique_code) {

	        return ChatRoom::where([
	                                'unique_code' => $unique_code
	                            ])
	                            ->first();
	    }
	}
   