import { useEffect, useState } from "react";

function App() {
  const [message, setMessage] = useState("Loading...");

  useEffect(() => {
    console.log("useEffect started");

    fetch("https://flowboard-api.test/api/ping")
      .then((res) => {
        console.log("Status:", res.status);
        return res.json();
      })
      .then((data) => {
        console.log("Response:", data);
        setMessage(data.message);
      })
      .catch((err) => {
        console.error("Fetch Error:", err);
        setMessage("Error");
      });
  }, []);

  return (
    <div style={{ padding: "40px" }}>
      <h1>Flowboard</h1>
      <h2>{message}</h2>
    </div>
  );
}

export default App;