import axios from "axios";
import { Message, MessageBox } from "element-ui";

// create an axios instance
const service = axios.create({
  baseURL: "/api" // url = base url + request url
  // withCredentials: true // send cookies when cross-domain requests
});

// response interceptor
service.interceptors.response.use(
  /**
   * If you want to get http information such as headers or status
   * Please return  response => response
   */

  /**
   * Determine the request status by custom code
   * Here is just an example
   * You can also judge the status by HTTP Status Code
   */
  response => {
    return response.data;
  },
  error => {
    console.log("err: " + error); // for debug
    Message({
      message: error.message,
      type: "error",
      duration: 5 * 1000
    });
    return Promise.reject(error);
  }
);

export default service;
