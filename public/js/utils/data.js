async function getData (url){
  const response = await fetch(url)
  return await response.json()
  
}

const setData = async(url,data)=>{
  const response = await fetch(url, {
    method: 'POST',
    body: data,
  })
  return await response.json()
}

const sendImage = async(url,data)=>{
  const response = await fetch(url, {
    method: 'POST',
    body: data,
    headers: {
      'Content-Type': 'multipart/form-data',
    }
  })
  return await response.json()
}