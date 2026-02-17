                  <div class="grid grid-cols-2 gap-4">
                      <div>
                          <x-input-label for="title_en" :value="__('English Title')" />
                          <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en"
                              :value="old('title_en', $testimonial->title['en'] ?? ('' ?? ''))" autofocus />
                          <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="title_ar" :value="__('Arabic Title')" />
                          <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar"
                              :value="old('title_ar', $testimonial->title['ar'] ?? '')" autofocus />
                          <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="mt-4">
                      <x-input-label for="image" />
                      <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file"
                          name="image" />

                      @if (isset($testimonial) && $testimonial->image)
                          <img src="{{ asset($testimonial->image->path) }}" alt="testimonial Image" width="100">
                      @endif

                      <x-input-error :messages="$errors->get('image')" class="mt-2" />
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                      <div class="mt-4">
                          <x-input-label for="review_en" :value="__('English Review')" />
                          <x-textarea id="review_en" rows="5" class="block mt-1 w-full"
                              name="review_en">{{ old('review_en', $testimonial->review['en'] ?? '') }}</x-textarea>
                          <x-input-error :messages="$errors->get('review_en')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="review_ar" :value="__('Arabic Review')" />
                          <x-textarea id="review_ar" rows="5" class="block mt-1 w-full"
                              name="review_ar">{{ old('review_ar', $testimonial->review['ar'] ?? '') }}</x-textarea>
                          <x-input-error :messages="$errors->get('review_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="grid grid-cols-1 gap-4">
                      <div class="mt-4">
                          <x-input-label for="position" :value="__('Position')" />
                          <x-text-input id="position" class="block mt-1 w-full" type="text" name="position"
                              :value="old('position', $testimonial->position ?? '')" placeholder="e.g. CEO, Manager, etc." />
                          <x-input-error :messages="$errors->get('position')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="rate" :value="__('Rate')" />
                          <x-select id="rate" class="block mt-1 w-full" name="rate">
                              <option value="">Select rate</option>
                              <option value="1"
                                  {{ old('rate', $testimonial->rate ?? '') == '1' ? 'selected' : '' }}>⭐</option>
                              <option value="2"
                                  {{ old('rate', $testimonial->rate ?? '') == '2' ? 'selected' : '' }}>⭐⭐</option>
                              <option value="3"
                                  {{ old('rate', $testimonial->rate ?? '') == '3' ? 'selected' : '' }}>⭐⭐⭐</option>
                              <option value="4"
                                  {{ old('rate', $testimonial->rate ?? '') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                              <option value="5"
                                  {{ old('rate', $testimonial->rate ?? '') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                          </x-select>
                          <x-input-error :messages="$errors->get('rate')" class="mt-2" />
                      </div>


                  </div>
