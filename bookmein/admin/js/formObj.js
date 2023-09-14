//json pattern for request obj
input =[{
    label:"Incert your name",
    type:"text",
    placeholder:"Write here something",
    required:"Input must be betweent 5 to 15 character"
  }];


textarea = [{
        type:"textarea",
        label:"Write Details",
        placeholder:"Text area",
        size:4,//size up to 1 to 5
        required:"The selction cant be empty" 
}];

select = [{
        type:"select",
        label:"Select your Favorite Movie",
        options:["Matrix","Alien","Star-War","Avengers","Game of Thrones"],
        required:"The selction cant be empty" 
  }];


//button is mentdatory for every form
button = [{
  type:"button",
  color:"primary",//primary(blue),secondary(gray),success(green),danger(red),warning(yellow),info(light-blue),light(white),dark(black)
  label:"Submit"
}];


checkbox = [{
 type:"checkbox",
 label:"arg",
 required:"The field must be filled"
}];

radio = [{
  type:"radio",
  label:"Male",
  required:"The field must be filled"
}];

file = [{
  type:"file",
  label:"Choose your pic",
  required:"Only .jpg,.png are allowed"
}];

time = [{
  type:"date",//date or time
  label:"Choose your convinient time",
  reqired:"This selction must be filled"
}];



/*
<form>
<div class="mb-3">
    <label class="form-label">label*</label>
    <input type="text" class="form-control">
    <div class="form-text">Maximum 30 characters allowed</div>
</div>
  <div class="mb-3">
    <label class="form-label">Item number*</label>
    <select class="form-select">
              <option selected value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
    </select>
</div>
<div class="mb-3">
  <button id="bookmeinselectadditem" class="btn btn-primary">Add Item</button>
</div>
<div class="mb-3">
    <label class="form-label">Massage</label>
    <input type="text"class="form-control">
    <div class="form-text">Maximum 70 characters allowed</div>
</div>
</form>

*/


//add new type of input field here

var form_obj_js = {
    email:`
    <form>
    <div class="mb-3">
        <label class="form-label">Label</label>
        <input type="email" class="form-control">
        <div class="form-text">Maximum 30 character allowed</div>
    </div>
    <div class="mb-3">
        <label class="form-label">placeholder</label>
        <input type="email" class="form-control">
        <div class="form-text">Maximum 30 character allowed</div>
    </div>
    </form>    
`,
    input:`
<form>
    <div class="row mb-3">
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Label*</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Type*</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Text</option>
              <option value="1">Number</option>
            </select>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">placeholder</label>
        <input type="email" class="form-control">
        <div class="form-text">Maximum 70 character allowed</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Required</label>
        <input type="email" class="form-control">
        <div class="form-text">Maximum 70 character allowed</div>
      </div>
</form>
`,

  textarea:`
  <form>
  <div class="mb-3">
      <label class="form-label">label*</label>
      <input type="text" class="form-control">
      <div class="form-text">Maximum 30 characters allowed</div>
    </div>
  <div class="mb-3">
      <label class="form-label">placeholder</label>
      <input type="text" class="form-control">
      <div class="form-text">Maximum 30 characters allowed</div>
  </div>
    <div class="mb-3">
      <label class="form-label">Input size</label>
      <input type="number" class="form-control">
      <div class="form-text">Maximum 150 and minimum 4 characters allowed in textarea</div>
  </div>
  <div class="mb-3">
      <label class="form-label">Massage</label>
      <input type="text"class="form-control">
      <div class="form-text">Maximum 70 characters allowed</div>
  </div>
  </form>
`,

seelct:`


`,

button:`


`,

checkbox:`


`,

radio:`


`,

file:`


`,

time:`


`
}

