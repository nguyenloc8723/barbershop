import React from "react";
import {createRoot} from "react-dom/client";
import {RouterProvider, Navigate, Outlet, createBrowserRouter} from "react-router-dom";
import Dashboard from "../fe/dashboard.jsx";
import Table from "../fe/combo/table.jsx";
import List_member from "../fe/members/list_member.jsx";
function App_react() {
    const router = createBrowserRouter([

        {
            path: "/admin",
            element: <Outlet />,
            children:[
                {
                    path:"Dashboard",
                    element: <Dashboard />
                },
                {
                    path: "table",
                    element: <Table />
                },
                {
                    path: "member",
                    element: <List_member />
                },
            ]
        }
    ])


    return (
        <RouterProvider router={router} />
        // <Dashboard />
    );
}

if (document.getElementById('app')){
    // const root = createRoot(document.getElementById('app'));
    // root.render(<App_react />);

    createRoot(document.getElementById('app')).render(<App_react />);
}
