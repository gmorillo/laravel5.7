<div class="container-fluid bg-danger my-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">
				<form action="/search" method="POST" role="search" class="card card-sm" style="border: none">
					{{ csrf_field() }}
					<div class="card-body row no-gutters align-items-center bg-danger p-2">
						<div class="col">
							<input name="q" class="bg-danger w-100 form-control-lg form-control-borderless text-white" type="search" placeholder="Escribe algo para realizar búsqueda">
						</div>
						<!--end of col-->
						<div class="col-auto">
							<button class="btn btn-outline-light p-3 m-0" type="submit"><i class="fas fa-search h4  m-0"></i></button>
						</div>
						<!--end of col-->
					</div>
				</form>
			</div>
			<!--end of col-->
		</div>
	</div>
</div>


<style>
	.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}

input {
  outline: none;
  padding: 12px;
  border-radius: 3px;
  border: 1px solid black;
}
input::-webkit-input-placeholder { /* Chrome */
  color: white;
  transition: opacity 250ms ease-in-out;
}
input:focus::-webkit-input-placeholder {
  opacity: 0.5;
}
input:-ms-input-placeholder { /* IE 10+ */
  color: white;
  transition: opacity 250ms ease-in-out;
}
input:focus:-ms-input-placeholder {
  opacity: 0.5;
}
input::-moz-placeholder { /* Firefox 19+ */
  color: white;
  opacity: 1;
  transition: opacity 250ms ease-in-out;
}
input:focus::-moz-placeholder {
  opacity: 0.5;
}
input:-moz-placeholder { /* Firefox 4 - 18 */
  color: white;
  opacity: 1;
  transition: opacity 250ms ease-in-out;
}
input:focus:-moz-placeholder {
  opacity: 0.5;
}
</style>