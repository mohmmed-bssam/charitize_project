                  <div class="grid grid-cols-2 gap-4">
                      <div>
                          <x-input-label for="title_en" :value="__('English Title')" />
                          <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en"
                              :value="old('title_en', $case->title['en'] ?? ('' ?? ''))" autofocus />
                          <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="title_ar" :value="__('Arabic Title')" />
                          <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar"
                              :value="old('title_ar', $case->title['ar'] ?? '')" autofocus />
                          <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="mt-4">
                      <x-input-label for="image" :value="__('Image')" />
                      <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file"
                          name="image"  />
                      @if ($case && $case->image)
                          <img src="{{ asset($case->image->path) }}" alt="case Image" width="100">
                      @endif
                      <x-input-error :messages="$errors->get('image')" class="mt-2" />
                  </div>
                  <div class="mt-4">
                      <x-input-label for="gallery" :value="__('Gallery')" />
                      <x-text-input accept="image/*" id="gallery" class="block mt-1 w-full" type="file"
                          name="gallery[]" multiple />
                       @if ($case && $case->gallery)
                          <div class="flex gap-1">
                            @foreach ($case->gallery as $item)
                              <img src="{{ asset($item->path) }}" alt="gallery Image" width="80">
                          @endforeach
                          </div>
                      @endif
                      <x-input-error :messages="$errors->get('gallery')" class="mt-2" />
                  </div>

                  <div class="grid grid-cols-2 gap-4">
                      <div class="mt-4">
                          <x-input-label for="content_en" :value="__('English Content')" />
                          <x-textarea id="content_en" rows="5" class="block mt-1 w-full"
                              name="content_en">{{ old('content_en', $case->content['en'] ?? '') }}</x-textarea>
                          <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="content_ar" :value="__('Arabic Content')" />
                          <x-textarea id="content_ar" rows="5" class="block mt-1 w-full"
                              name="content_ar">{{ old('content_ar', $case->content['ar'] ?? '') }}</x-textarea>
                          <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="mt-4 grid grid-cols-3 gap-4">
                      <div>
                          <x-input-label for="goal" :value="__('Goal')" />
                          <x-text-input id="goal" class="block mt-1 w-full" type="number" name="goal"
                              :value="old('goal', $case->goal)" />
                          <x-input-error :messages="$errors->get('goal')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="category_id" :value="__('Category')" />
                          <x-select id="category_id" class="block mt-1 w-full" name="category_id">
                              @foreach ($categories as $category)
                                  <option @selected(old('category_id', $case->category_id) == $category->id) value="{{ $category->id }}">
                                      {{ $category->title[app()->getLocale()] }}</option>
                              @endforeach
                          </x-select>
                          <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="status" :value="__('Status')" />
                          <x-select id="status" class="block mt-1 w-full" name="status">
                              <option @selected(old('status', $case->status) == 'open') value="open">Open</option>
                              <option @selected(old('status', $case->status) == 'close') value="close">Close</option>
                          </x-select>
                          <x-input-error :messages="$errors->get('status')" class="mt-2" />
                      </div>



                  </div>
