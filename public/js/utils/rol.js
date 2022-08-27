const validateRole = (action) => {
  if (rol == 1){
    return true;
  }
  if (rol == 2){
    if (action == 'update'){
      return true;
    }
    if (action == 'create'){
      return true;
    }
  }

  return false;
}