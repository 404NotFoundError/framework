
/* Transforme un objet, en une http query */

const encodeQueryData = (data) => {
  const ret = [];
   for (let d in data)
     ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
   return ret.join('&');
}

export default encodeQueryData;
