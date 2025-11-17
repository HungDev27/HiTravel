// import axios from "axios";
// import { createToaster } from "@meforma/vue-toaster";
// const toaster = createToaster({ position: "top-right" });

// export default async function (to, from, next) {
//   const token = localStorage.getItem("key_admin");
//   if (!token) {
//     toaster.error("Bạn chưa đăng nhập");
//     return next("/admin/dang-nhap");
//   }

//   try {
//     // ưu tiên gọi profile (theo BE bạn có profile())
//     const res = await axios.get("http://127.0.0.1:8000/api/profile", {
//       headers: { Authorization: "Bearer " + token },
//     });

//     // res.data có thể là user object
//     const ho_va_ten = res.data?.ho_va_ten || res.data?.name || res.data?.user?.ho_va_ten
//     if (ho_va_ten) localStorage.setItem("ho_va_ten", ho_va_ten)
//     return next()
//   } catch (err) {
//     // nếu profile không tồn tại, thử endpoint cũ /api/admin/check-token để tương thích
//     try {
//       const res2 = await axios.get("http://127.0.0.1:8000/api/admin/check-token", {
//         headers: { Authorization: "Bearer " + token },
//       });
//       if (res2.data.status) {
//         localStorage.setItem("ho_va_ten", res2.data.ho_va_ten)
//         return next()
//       } else {
//         toaster.error(res2.data.message || "Không có quyền truy cập")
//         return next("/admin/dang-nhap")
//       }
//     } catch (err2) {
//       toaster.error("Phiên đã hết hạn hoặc không hợp lệ")
//       return next("/admin/dang-nhap")
//     }
//   }
// }
