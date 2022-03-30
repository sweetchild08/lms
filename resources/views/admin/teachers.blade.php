@extends('layouts.base')

@section('content')
    <div>  
        <h2 class="mx-6 mt-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Teachers
        </h2>
    </div>  
    <div class="grid grid-cols-1 lg:grid-cols-3 p-4">
        <div class="m-4">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Add Teacher
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 pb-6">
              <form method="post" id="frmaddteacher">
                @csrf
                <x-form.input label="First Name" name="first_name" />
                <x-form.input label="Middle Name" name="middle_name" />
                <x-form.input label="Last Name" name="last_name" />
                <x-form.input label="Title/Designation" name="title" />
                <x-form.input label="Username" name="username" />
                <x-form.input label="E-mail" name="email" />
                <x-form.input label="Password" name="password" type="password" />
                <x-form.input label="Password Confirmation" name="password_confirmation" type="password" />

                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded font-medium hover:bg-green-700 transition duration-200 each-in-out">Add</button>
                </div>
              </form>
            </div>
        </div>
                  <!-- Client Table -->
                  <div class="mt-4 mx-4 lg:col-span-2">
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Teachers List
                    </h4>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                      <div class="w-full overflow-x-auto">
                        <table class="w-full">
                          <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                              <th class="px-4 py-3">Teacher</th>
                              <th class="px-4 py-3">Classes</th>
                              <th class="px-4 py-3">Status</th>
                              <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                            @forelse ($teachers as $teacher)
                                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                        <p class="font-semibold">{{$teacher->getFullName()}}</p>
                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p> --}}
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm"></td>
                                    <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Active </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                      
                                    <div class="flex item-center justify-center">
                                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg>
                                      </div>
                                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                          </svg>
                                      </div>
                                      {{-- delete --}}
                                      <div data-teacherid="{{$teacher->id}}" class="delteacher w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                      </div>
                                  </div>
                                    </td>
                                </tr>
                            @empty
                              <tr><td colspan="4" class="text-center"><h3>No data...</h3></td></tr>
                            @endforelse
                            {{-- <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                  </div>
                                  <div>
                                    <p class="font-semibold">Hans Burger</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p>
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">$855.85</td>
                              <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Approved </span>
                              </td>
                              <td class="px-4 py-3 text-sm">15-01-2021</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                  </div>
                                  <div>
                                    <p class="font-semibold">Jolina Angelie</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Unemployed</p>
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">$369.75</td>
                              <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full"> Pending </span>
                              </td>
                              <td class="px-4 py-3 text-sm">23-03-2021</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1502720705749-871143f0e671?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=b8377ca9f985d80264279f277f3a67f5" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                  </div>
                                  <div>
                                    <p class="font-semibold">Dave Li</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Influencer</p>
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">$775.45</td>
                              <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700"> Expired </span>
                              </td>
                              <td class="px-4 py-3 text-sm">09-02-2021</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                  </div>
                                  <div>
                                    <p class="font-semibold">Rulia Joberts</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Actress</p>
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">$1276.75</td>
                              <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Approved </span>
                              </td>
                              <td class="px-4 py-3 text-sm">17-04-2021</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1566411520896-01e7ca4726af?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                  </div>
                                  <div>
                                    <p class="font-semibold">Hitney Wouston</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Singer</p>
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">$863.45</td>
                              <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"> Denied </span>
                              </td>
                              <td class="px-4 py-3 text-sm">11-01-2021</td>
                            </tr> --}}
                          </tbody>
                        </table>
                      </div>
                      {{-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3"> Showing 21-30 of 100 </span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                          <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                              <li>
                                <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                  <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                  </svg>
                                </button>
                              </li>
                              <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                              </li>
                              <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                              </li>
                              <li>
                                <button class="px-3 py-1 text-white dark:text-gray-800 transition-colors duration-150 bg-blue-600 dark:bg-gray-100 border border-r-0 border-blue-600 dark:border-gray-100 rounded-md focus:outline-none focus:shadow-outline-purple">3</button>
                              </li>
                              <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                              </li>
                              <li>
                                <span class="px-3 py-1">...</span>
                              </li>
                              <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                              </li>
                              <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
                              </li>
                              <li>
                                <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                  <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                  </svg>
                                </button>
                              </li>
                            </ul>
                          </nav>
                        </span>
                      </div> --}}
                    </div>
                  </div>
                  <!-- ./Client Table -->
    </div>
@endsection

@push('script')
<script>

$('#frmaddteacher').submit((e)=>{
  console.log(e)
      e.preventDefault();
      $.ajax({
        url:'{{route('admin.teachers.store')}}',
        type:'post',
        data:$(e.target).serialize(),
        success:(res)=>{
          swal(res.message, {
              icon: "success",
            });
        location.reload()
        },
        error:(err)=>{
          if(err.status==422){
              showInputErrors(err);
          }
        }
      })
    })
  $('.delteacher').click(function(e){
    let id=$(this).data('teacherid')
    let url='{{route('admin.teachers.destroy',':id')}}'
    url=url.replace(':id',id)
    swal({
      title: "Are you sure to delete?",
      // text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url:url,
              type:'delete',
              data:{_token:'{{csrf_token()}}'},
              success:(res)=>{
                  swal(res.message, {
                      icon: "success",
                  });
                  location.reload()
              },
              error:(err)=>{
                  swal({
                      title: "Teacher Deleting Failed",
                      text: err.responseJSON.message,
                      icon: "error",
                  });
              }
          })
      }
      });
  })
</script>
@endpush