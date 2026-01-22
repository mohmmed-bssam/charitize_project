                  <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="title_en" :value="__('English Title')" />
                                <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en"
                                    :value="old('title_en',$slider->title['en'] ?? '' ?? '')" autofocus />
                                <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="title_ar" :value="__('Arabic Title')" />
                                <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar"
                                    :value="old('title_ar',$slider->title['ar'] ?? '')" autofocus />
                                <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image" />
                            <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file"
                                name="image" />
                                @if($slider && $slider->image)
                                <img src="{{ asset($slider->image->path) }}" alt="Slider Image" width="100">
                            @endif
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mt-4">
                                <x-input-label for="content_en" :value="__('English Content')" />
                                <x-textarea id="content_en" rows="5" class="block mt-1 w-full"
                                    name="content_en">{{ old('content_en',$slider->content['en'] ?? '') }}</x-textarea>
                                <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="content_ar" :value="__('Arabic Content')" />
                                <x-textarea id="content_ar" rows="5" class="block mt-1 w-full"
                                    name="content_ar">{{ old('content_ar',$slider->content['ar'] ?? '') }}</x-textarea>
                                <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                            </div>
                        </div>
                            <div class="mt-4 grid grid-cols-3 gap-4">
                                 <div>
                                    <x-input-label for="btn1_text_en" :value="__('English Button 1 Text')" />
                                    <x-text-input id="btn1_text_en" class="block mt-1 w-full" type="text"
                                        name="btn1_text_en" :value="old('btn1_text_en',$slider->btn1_text['en'] ?? '')" />
                                    <x-input-error :messages="$errors->get('btn1_text_en')" class="mt-2" />
                                </div>
                                 <div>
                                    <x-input-label for="btn1_text_ar" :value="__('Arabic Button 1 Text')" />
                                    <x-text-input id="btn1_text_ar" class="block mt-1 w-full" type="text"
                                        name="btn1_text_ar" :value="old('btn1_text_ar',$slider->btn1_text['ar'] ?? '')" />
                                    <x-input-error :messages="$errors->get('btn1_text_ar')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="btn1_link" :value="__('Button 1 Link')" />
                                    <x-text-input id="btn1_link" class="block mt-1 w-full" type="text"
                                        name="btn1_link" :value="old('btn1_link',$slider->btn1_link)" />
                                    <x-input-error :messages="$errors->get('btn1_link')" class="mt-2" />
                                </div>

                            </div>
                            <div class="mt-4 grid grid-cols-3 gap-4">
                                 <div class="mt-4">
                                    <x-input-label for="btn2_text_en" :value="__('English Button 2 Text')" />
                                    <x-text-input id="btn2_text_en" class="block mt-1 w-full" type="text"
                                        name="btn2_text_en" :value="old('btn2_text_en',$slider->btn2_text['en'] ?? '')" />
                                    <x-input-error :messages="$errors->get('btn2_text_en')" class="mt-2" />
                                </div>
                                 <div class="mt-4">
                                    <x-input-label for="btn2_text_ar" :value="__('Arabic Button 2 Text')" />
                                    <x-text-input id="btn2_text_ar" class="block mt-1 w-full" type="text"
                                        name="btn2_text_ar" :value="old('btn2_text_ar',$slider->btn2_text['ar'] ?? '')" />
                                    <x-input-error :messages="$errors->get('btn2_text_ar')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="btn2_link" :value="__('Button 2 Link')" />
                                    <x-text-input id="btn2_link" class="block mt-1 w-full" type="text"
                                        name="btn2_link" :value="old('btn2_link',$slider->btn2_link)" />
                                    <x-input-error :messages="$errors->get('btn2_link')" class="mt-2" />
                                </div>


                            </div>
