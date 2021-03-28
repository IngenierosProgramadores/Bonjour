import axios from 'axios'
import qs from 'qs'

const api = {
  request: (config) => axios.request(qs.stringify(config)),
  get: (url, config) => axios.get(url, qs.stringify(config)),
  post: (url, config) => axios.post(url, qs.stringify(config)),
  put: (url, config) => axios.put(url, qs.stringify(config)),
  file: (url, request) => axios.post(url, request, { headers: { 'Content-Type': 'multipart/form-data' } }),
  delete: (url, config) => axios.delete(url, qs.stringify(config))
}

export default api
